from PIL import Image

filepath = 'public/favicon.png'
try:
    img = Image.open(filepath)
    img = img.resize((32, 32), Image.Resampling.LANCZOS)
    img.save(filepath, optimize=True)
    print("Favicon optimized")
except Exception as e:
    print(f"Error: {e}")
