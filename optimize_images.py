import os
from PIL import Image

image_dir = 'public/images'
for filename in os.listdir(image_dir):
    if filename.endswith('.png') or filename.endswith('.jpg') or filename.endswith('.jpeg'):
        filepath = os.path.join(image_dir, filename)
        try:
            img = Image.open(filepath)
            
            # Reduce size if too large
            if img.width > 1200:
                ratio = 1200.0 / img.width
                new_height = int(img.height * ratio)
                img = img.resize((1200, new_height), Image.Resampling.LANCZOS)
            
            # Save optimized
            img.save(filepath, optimize=True, quality=85)
            print(f"Optimized: {filename}")
        except Exception as e:
            print(f"Error optimizing {filename}: {e}")
