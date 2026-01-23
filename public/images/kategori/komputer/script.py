from PIL import Image
import os

# Get the directory where the script is located
script_dir = os.path.dirname(os.path.abspath(__file__))

# Common image extensions
img_extensions = {'.png', '.bmp', '.gif', '.tiff', '.tif', '.webp', '.ico'}

# Process all files in the directory
for filename in os.listdir(script_dir):
    file_path = os.path.join(script_dir, filename)
    
    # Skip if not a file
    if not os.path.isfile(file_path):
        continue
    
    # Get file extension
    _, ext = os.path.splitext(filename)
    
    # Check if it's an image file (but not already a jpg)
    if ext.lower() in img_extensions:
        try:
            # Open the image
            img = Image.open(file_path)
            
            # Convert RGBA to RGB if necessary (for PNG with transparency)
            if img.mode in ('RGBA', 'LA', 'P'):
                rgb_img = Image.new('RGB', img.size, (255, 255, 255))
                rgb_img.paste(img, mask=img.split()[-1] if img.mode == 'RGBA' else None)
                img = rgb_img
            
            # Create output filename
            output_filename = os.path.splitext(filename)[0] + '.jpg'
            output_path = os.path.join(script_dir, output_filename)
            
            # Save as JPG
            img.save(output_path, 'JPEG', quality=95)
            print(f"Converted: {filename} -> {output_filename}")
            
        except Exception as e:
            print(f"Error converting {filename}: {e}")

print("Conversion complete!")
