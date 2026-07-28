import os
from PIL import Image

image_dir = 'public/images'
for filename in os.listdir(image_dir):
    if filename.endswith('.png') or filename.endswith('.jpg') or filename.endswith('.jpeg'):
        filepath = os.path.join(image_dir, filename)
        
        # New WebP filename
        base_name = os.path.splitext(filename)[0]
        webp_filename = base_name + '.webp'
        webp_filepath = os.path.join(image_dir, webp_filename)
        
        try:
            img = Image.open(filepath)
            
            # Reduce size if too large
            if img.width > 1200:
                ratio = 1200.0 / img.width
                new_height = int(img.height * ratio)
                img = img.resize((1200, new_height), Image.Resampling.LANCZOS)
            
            # Convert to RGB if saving to WebP and it has alpha
            if img.mode == 'P':
                img = img.convert('RGBA')
            
            # Save optimized WebP
            img.save(webp_filepath, format="webp", optimize=True, quality=80)
            print(f"Converted to WebP: {webp_filename}")
        except Exception as e:
            print(f"Error optimizing {filename}: {e}")
