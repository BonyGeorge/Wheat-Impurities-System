print(__doc__)

# Needed Libraries.
import os
import numpy as np
import cv2
import pickle
import random 
import matplotlib.pyplot as plt
from sklearn.model_selection import train_test_split
from sklearn.svm import SVC
from sklearn.metrics import plot_confusion_matrix


# Global Variables.
DIR = '/home/abanoublamie/Graduation_Project/test_data'
categories = ['Healthy Wheat', 'Wild Oat']
data = []
class_names = ["Healthy Wheat", "Wild Oats"]

'''
# Holding the Categories Tree.
for category in categories:
    path = os.path.join(DIR, category)
    label = categories.index(category)

    # Holding the images and tranfer them into Greyscale.
    for image in os.listdir(path):
        image_path = os.path.join(path, image)
        imgs = cv2.imread(image_path, 3)   
        imgs = cv2.resize(imgs, (50,50))
        img = np.array(imgs).flatten()

        data.append([img, label])

# Serializing of object structure file.
pick_in = open('data.pickle', 'wb')
pickle.dump(data, pick_in)
pick_in.close()
'''

pick_in = open('data.pickle', 'rb')
data = pickle.load(pick_in)
pick_in.close()

# Label each feature.
random.shuffle(data)
features = []
labels = [] 

for feature, label in data:
    features.append(feature)
    labels.append(label)

# Spliting the data into training & testing.
x_train, x_test, y_train, y_test = train_test_split(features, labels, test_size=0.1)

# Training & Evaluating our model.
model = SVC(C=1, kernel='poly', gamma='auto')
model.fit(x_train, y_train)

# Making a single prediction and printing accuracy.
prediction = model.predict(x_test)
accuracy = model.score(x_test, y_test)
print('The SVM model predicts: ', categories[prediction[0]])
print('The SVM model accuracy is: ', round(accuracy * 100, 2), ' %')

# Plot non-normalized confusion matrix
titles_options = [("Confusion matrix, without normalization", None),
                  ("Normalized confusion matrix", 'true')]
for title, normalize in titles_options:
    disp = plot_confusion_matrix(model, x_test, y_test,
                                 display_labels=class_names,
                                 cmap=plt.cm.Blues,
                                 normalize=normalize)
    disp.ax_.set_title(title)

    print(title)
    print(disp.confusion_matrix)

plt.show()