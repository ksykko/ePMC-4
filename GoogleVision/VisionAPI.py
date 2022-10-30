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
docText = response.full_text_annotation

def assemble_word(word):
    assembled_word=""
    for symbol in word.symbols:
        assembled_word+=symbol.text
    return assembled_word
def find_word_location(document,word_to_find):
    for page in document.pages:
        for block in page.blocks:
            for paragraph in block.paragraphs:
                for word in paragraph.words:
                    assembled_word=assemble_word(word)
                    if(assembled_word==word_to_find):
                        return word.bounding_box
                    
location=find_word_location(docText,"LOPEZ")


def text_within(document,x1,y1,x2,y2): 
  text=""
  for page in document.pages:
    for block in page.blocks:
      for paragraph in block.paragraphs:
        for word in paragraph.words:
          for symbol in word.symbols:
            min_x=min(symbol.bounding_box.vertices[0].x,symbol.bounding_box.vertices[1].x,symbol.bounding_box.vertices[2].x,symbol.bounding_box.vertices[3].x)
            max_x=max(symbol.bounding_box.vertices[0].x,symbol.bounding_box.vertices[1].x,symbol.bounding_box.vertices[2].x,symbol.bounding_box.vertices[3].x)
            min_y=min(symbol.bounding_box.vertices[0].y,symbol.bounding_box.vertices[1].y,symbol.bounding_box.vertices[2].y,symbol.bounding_box.vertices[3].y)
            max_y=max(symbol.bounding_box.vertices[0].y,symbol.bounding_box.vertices[1].y,symbol.bounding_box.vertices[2].y,symbol.bounding_box.vertices[3].y)
            if(min_x >= x1 and max_x <= x2 and min_y >= y1 and max_y <= y2):
              text+=symbol.text
              if(symbol.property.detected_break.type==1 or 
                symbol.property.detected_break.type==3):
                text+=' '
              if(symbol.property.detected_break.type==2):
                text+='\t'
              if(symbol.property.detected_break.type==5):
                text+='\n'
                
    return text

print(text_within(docText, location.vertices[1].x, location.vertices[1].y, 30+location.vertices[1].x+(location.vertices[1].x-location.vertices[0].x),location.vertices[2].y))


