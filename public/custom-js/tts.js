(function(global) {
    'use strict';

    let _currentAudio = null;

    function _clean(text) {
        return text.replace(/<\/?[^>]+(>|$)/g, '').trim();
    }

    function _getDeVoice() {
        const voices = window.speechSynthesis ? window.speechSynthesis.getVoices() : [];
        return voices.find(v => v.lang === 'de-DE')
            || voices.find(v => v.lang.startsWith('de'))
            || voices.find(v => v.name.includes('Google Deutsch'))
            || null;
    }

    function _speechFallback(text) {
        if (!window.speechSynthesis) return;
        window.speechSynthesis.cancel();
        const ut = new SpeechSynthesisUtterance(text);
        ut.lang = 'de-DE';
        ut.rate = 0.92;
        const voice = _getDeVoice();
        if (voice) ut.voice = voice;
        window.speechSynthesis.speak(ut);
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
        const url = 'https://translate.google.com/translate_tts'
            + '?client=webapp&ie=UTF-8&tl=de&q=' + encodeURIComponent(clean);
        _currentAudio = new Audio(url);
        _currentAudio.volume = 1.0;
        _currentAudio.play().catch(function() {
            _speechFallback(clean);
        });
    }

    if (window.speechSynthesis) {
        window.speechSynthesis.onvoiceschanged = function() {
            window.speechSynthesis.getVoices();
        };
        setTimeout(function() { window.speechSynthesis.getVoices(); }, 200);
    }

    global.speakGerman = speakGerman;

})(window);
