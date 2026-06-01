import os
import glob
import re

replacements = {
    # Greens -> Golds
    r'#10b981': '#FFCE00',
    r'#34d399': '#FFD700',
    r'#059669': '#B45309',
    r'#dcfce7': '#FEF9C3',
    r'#15803d': '#854D0E',
    r'#f0fdf4': '#FEF9C3',
    
    # Indigos/Blues -> Reds
    r'#4f46e5': '#DD0000',
    r'#6366f1': '#FF3333',
    r'#e0e7ff': '#FEE2E2',
    r'#312e81': '#450a0a',
    
    # Oranges/Ambers -> Blacks (or Golds)
    r'#f59e0b': '#1A1A1A',
    
    # Purples/Pinks -> Blacks/Reds
    r'#8b5cf6': '#1A1A1A',
    r'#db2777': '#000000',
    r'#fce7f3': '#E2E8F0',
    
    # Cyan -> Red
    r'#06b6d4': '#DD0000',
    r'#cffafe': '#FEE2E2',
}

files_to_check = glob.glob('/Users/akarsu/Desktop/almingo/public/custom-css/*.css') + \
                 glob.glob('/Users/akarsu/Desktop/almingo/resources/views/user/lessons/*.blade.php') + \
                 glob.glob('/Users/akarsu/Desktop/almingo/resources/views/user/home.blade.php')

for filepath in files_to_check:
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    new_content = content
    for old, new in replacements.items():
        new_content = re.compile(old, re.IGNORECASE).sub(new, new_content)
    
    # In buttons, if background is Gold (#FFCE00), change text to black
    new_content = re.sub(r'(background:\s*#FFCE00;.*?)color:\s*#fff;', r'\1color: #000;', new_content, flags=re.IGNORECASE|re.DOTALL)
    new_content = re.sub(r'(background:\s*#FFCE00;\s*color:\s*)#fff;', r'\1#000;', new_content, flags=re.IGNORECASE)
    
    if new_content != content:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(new_content)
        print(f"Updated {filepath}")

