import os
import glob
import re

tts_replacement = """
    let currentAudioNode = null;
    function {func_name}(text) {
        if (!text) return;
        if (currentAudioNode) { currentAudioNode.pause(); currentAudioNode = null; }
        
        const cleanText = text.replace(/<\\/?[^>]+(>|$)/g, "").trim();
        const url = `https://translate.googleapis.com/translate_tts?client=gtx&ie=UTF-8&tl=de-DE&q=${encodeURIComponent(cleanText)}`;
        currentAudioNode = new Audio(url);
        currentAudioNode.play().catch(e => {
            console.log('Google API TTS failed', e);
            // Fallback to basic if absolutely needed, but let's try to avoid the robot at all costs
            if(window.speechSynthesis) {
                const ut = new SpeechSynthesisUtterance(cleanText);
                ut.lang = 'de-DE';
                window.speechSynthesis.speak(ut);
            }
        });
    }
"""

for js_file in glob.glob('/Users/akarsu/Desktop/almingo/public/custom-js/*.js'):
    if 'mix-app.js' in js_file: continue
    
    with open(js_file, 'r') as f:
        content = f.read()
        
    # Replace speak(text)
    if 'function speak(text)' in content:
        content = re.sub(r'function speak\(text\)\s*\{.*?\n    \}', tts_replacement.replace('{func_name}', 'speak'), content, flags=re.DOTALL)
        
    # Replace speakGerman(text)
    if 'function speakGerman(text)' in content:
        content = re.sub(r'function speakGerman\(text\)\s*\{.*?\n    \}', tts_replacement.replace('{func_name}', 'speakGerman'), content, flags=re.DOTALL)
        
    with open(js_file, 'w') as f:
        f.write(content)
        
print("Replaced TTS with googleapis in all files.")
