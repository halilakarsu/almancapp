(function(global) {
    'use strict';

    let _utterance = null;

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

    function speakGerman(text) {
        if (!text || !window.speechSynthesis) return;
        window.speechSynthesis.cancel();
        const clean = _clean(text);
        if (!clean) return;
        const ut = new SpeechSynthesisUtterance(clean);
        ut.lang = 'de-DE';
        ut.rate = 0.92;
        const voice = _getDeVoice();
        if (voice) ut.voice = voice;
        window.speechSynthesis.speak(ut);
        _utterance = ut;
    }

    if (window.speechSynthesis) {
        window.speechSynthesis.onvoiceschanged = function() {
            window.speechSynthesis.getVoices();
        };
        setTimeout(function() { window.speechSynthesis.getVoices(); }, 200);
    }

    global.speakGerman = speakGerman;

})(window);
