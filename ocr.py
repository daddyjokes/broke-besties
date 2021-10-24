#######################################################################################
#    Title: Microsoft Azure Form Recognizer
#    Author: Microsoft
#    Date: 10/22/21
#    Code version: v2.1
#    Availability: https://docs.microsoft.com/en-us/azure/applied-ai-services/form-recognizer/
#######################################################################################

import sys
sys.path.append("/opt/anaconda3/lib/python3.8/site-packages") # Add Azure to PATH

from azure.core.exceptions import ResourceNotFoundError
from azure.ai.formrecognizer import FormRecognizerClient
from azure.ai.formrecognizer import FormTrainingClient
from azure.core.credentials import AzureKeyCredential

def ocr(image):
    """
    Optical character recognition function using Microsoft Azure Form Recognizer
    Pass in .png, .jpg, .jpeg, or .pdf
    Reads receipts for information and
    Returns dict with merchant name, total price, date, and time (if available)
    """
    info_dict = {
        "MerchantName" : "",
        "Total" : "",
        "TransactionDate" : "",
        "TransactionTime" : ""
    }

    # Initalize API
    endpoint = "https://fr-ocr.cognitiveservices.azure.com/"
    key = "9367d6dc983e4b04a415d1ad3df4f3cf"
    client = FormRecognizerClient(endpoint, AzureKeyCredential(key))

    # Get image's byte array
    with open(image, "rb") as image:
        receipt_address = bytearray(image.read())

    # Grab all information from image
    try: # process png image
        poller = client.begin_recognize_receipts(receipt_address, content_type = "image/png")
    except:
        try: # process jpg image
            poller = client.begin_recognize_receipts(receipt_address, content_type = "image/jpeg")
        except:
            try: # process pdf
                poller = client.begin_recognize_receipts(receipt_address, content_type = "application/pdf")
            except:
                return info_dict  # not valid file type
    result = poller.result()

    # Get results
    confidence_min = .7 # not fine-tuned value
    for receipt in result:
        for name, field in receipt.fields.items():
            if field.confidence >= confidence_min and name in info_dict.keys() and field.value != None:
                info_dict[name] = field.value

    return info_dict

ocr(sys.argv[1])
