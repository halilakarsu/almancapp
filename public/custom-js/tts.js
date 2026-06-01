/**
 * Almingo TTS — Merkezi Almanca Sesli Okuma Modülü
 * Sıra: 1) ResponsiveVoice  2) Google TTS  3) Web SpeechSynthesis
 */

(function(global) {
    'use strict';

    let _currentAudio = null;

    function _clean(text) {
        return text.replace(/<\/?[^>]+(>|$)/g, '').trim();
    }

    function _getBestDeVoice() {
        const voices = window.speechSynthesis ? window.speechSynthesis.getVoices() : [];
        return voices.find(v => v.name.includes('Google Deutsch'))
            || voices.find(v => v.lang === 'de-DE')
            || voices.find(v => v.lang.startsWith('de'))
            || null;
    }

    function _fallbackSpeech(text) {
        if (!window.speechSynthesis) return;
        window.speechSynthesis.cancel();
        const ut = new SpeechSynthesisUtterance(text);
        ut.lang = 'de-DE';
        ut.rate = 0.92;
        ut.pitch = 1.0;
        const voice = _getBestDeVoice();
        if (voice) ut.voice = voice;
        window.speechSynthesis.speak(ut);
    }

    function _responsiveVoice(text) {
        if (typeof responsiveVoice !== 'undefined') {
            responsiveVoice.speak(text, 'Deutsch Female', {
                rate: 0.9, pitch: 1.0, volume: 1
            });
        } else {
            _googleTTS(text);
        }
    }

    function _googleTTS(text) {
        if (_currentAudio) {
            _currentAudio.pause();
            _currentAudio.src = '';
            _currentAudio = null;
        }
        const url = 'https://translate.google.com/translate_tts'
            + '?client=webapp&ie=UTF-8&tl=de&q=' + encodeURIComponent(text);
        _currentAudio = new Audio(url);
        _currentAudio.volume = 1.0;
        _currentAudio.play().catch(() => _fallbackSpeech(text));
    }

    function speakGerman(text) {
        if (!text) return;
        if (_currentAudio) {
            _currentAudio.pause();
            _currentAudio.src = '';
            _currentAudio = null;
        }
        if (window.speechSynthesis) {
            window.speechSynthesis.cancel();
        }
        const clean = _clean(text);
        if (!clean) return;
        _responsiveVoice(clean);
    }

    if (window.speechSynthesis) {
        window.speechSynthesis.onvoiceschanged = function() {
            window.speechSynthesis.getVoices();
        };
        setTimeout(function() { window.speechSynthesis.getVoices(); }, 200);
    }

    global.speakGerman = speakGerman;

})(window);
