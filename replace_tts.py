import os
import glob
import re

tts_replacement = """
    let currentAudioNode = null;
    function FUNC_NAME(text) {
        if (!text) return;
        if (currentAudioNode) { currentAudioNode.pause(); currentAudioNode = null; }
        
        const cleanText = text.replace(/<\\/?[^>]+(>|$)/g, "").trim();
        const url = `https://translate.google.com/translate_tts?ie=UTF-8&q=${encodeURIComponent(cleanText)}&tl=de&client=tw-ob`;
        currentAudioNode = new Audio(url);
        currentAudioNode.play().catch(e => {
            console.log('Google TTS failed', e);
        });
    }
"""

for js_file in glob.glob('/Users/akarsu/Desktop/almingo/public/custom-js/*.js'):
    if 'mix-app.js' in js_file: continue
    
    with open(js_file, 'r') as f:
        content = f.read()
        
    # Replace speak(text)
    if 'function speak(text)' in content:
        content = re.sub(r'function speak\(text\)\s*\{.*?\n    \}', tts_replacement.replace('FUNC_NAME', 'speak'), content, flags=re.DOTALL)
        
    # Replace speakGerman(text)
    if 'function speakGerman(text)' in content:
        content = re.sub(r'function speakGerman\(text\)\s*\{.*?\n    \}', tts_replacement.replace('FUNC_NAME', 'speakGerman'), content, flags=re.DOTALL)
        
    with open(js_file, 'w') as f:
        f.write(content)
        
print("Replaced TTS in all files.")
