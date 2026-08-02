import os
from PIL import Image

image_dir = 'public/images'
for filename in os.listdir(image_dir):
    if filename.lower().endswith(('.png', '.jpg', '.jpeg')):
        filepath = os.path.join(image_dir, filename)
        base = os.path.splitext(filename)[0]
        webp_filepath = os.path.join(image_dir, base + '.webp')
        try:
            img = Image.open(filepath)
            if img.mode in ("RGBA", "P"):
                img = img.convert("RGBA")
            else:
                img = img.convert("RGB")
            
            # Reduce size if too large
            if img.width > 1200:
                ratio = 1200.0 / img.width
                new_height = int(img.height * ratio)
                img = img.resize((1200, new_height), Image.Resampling.LANCZOS)
            
            img.save(webp_filepath, 'webp', optimize=True, quality=85)
            print(f"Converted to WEBP: {base}.webp")
        except Exception as e:
            print(f"Error converting {filename}: {e}")
