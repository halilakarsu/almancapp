import os
from rembg import remove
from PIL import Image

brain_dir = "/Users/akarsu/.gemini/antigravity/brain/17874f1d-e13e-411e-b81d-043d64229fab/"
output_dir = "/Users/akarsu/Desktop/almingo/public/uploads/levels/"

mapping = {
    "a1-baslangic-seviyesi": "media__1778530188759.png",
    "a2-temel-seviye": "media__1778530438291.png",
    "b1-orta-seviye": "media__1778530549263.png",
    "b2-bagimsiz-kullanici": "media__1778530579084.jpg",
    "c11-ileri-seviye": "media__1778530632250.png",
    "c21-ust-duzey": "media__1778530674844.jpg",
}

if not os.path.exists(output_dir):
    os.makedirs(output_dir)

for slug, filename in mapping.items():
    input_path = os.path.join(brain_dir, filename)
    output_path = os.path.join(output_dir, slug + ".png")
    
    print(f"Processing {filename} for {slug}...")
    try:
        with open(input_path, 'rb') as i:
            with open(output_path, 'wb') as o:
                input_data = i.read()
                output_data = remove(input_data)
                o.write(output_data)
        print(f"Saved to {output_path}")
    except Exception as e:
        print(f"Error processing {filename}: {e}")

print("All done!")
