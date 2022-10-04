import os, io
import pdb
from google.cloud import vision_v1
import pandas as pd

os.environ['GOOGLE_APPLICATION_CREDENTIALS'] = r'Keys\epmcdb-81960-04ac81853883.json'

client = vision_v1.ImageAnnotatorClient()


# def detectText(img): 
#     """Detects text in the file."""
#     with io.open(img, 'rb') as image_file:
#         content = image_file.read()
        
#     image = vision_v1.types.Image(content=content)
#     response = client.document_text_detection(image=image)
#     texts = response.text_annotations

#     pd.set_option('display.max_rows', 500)
#     df = pd.DataFrame(columns=['locale', 'description']) 
#     df = pd.DataFrame({'locale': [t.locale for t in texts], 'description': [t.description for t in texts]})

#     return df


# FILE_NAME = 'sample.jpg'
# FOLDER_PATH = r'img'

# print(detectText(os.path.join(FOLDER_PATH, FILE_NAME)))

FOLDER_PATH = r'img'
IMAGE_FILE = 'samplePatientRecord.jpg'
FILE_PATH = os.path.join(FOLDER_PATH, IMAGE_FILE)

with io.open(FILE_PATH, 'rb') as image_file:
    content = image_file.read()
    
image = vision_v1.types.Image(content=content)
response = client.document_text_detection(image=image)
docText = response.full_text_annotation.text
print(docText)