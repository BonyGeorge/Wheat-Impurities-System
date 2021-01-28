import matplotlib.pyplot as plt
import numpy as np
import pandas as pd
import cv2
import math
from sklearn import mixture
from sklearn.utils import shuffle
from skimage import measure
from glob import glob
import os

TRAIN_DATA = "../dataset/trainning_set"
TEST_DATA = "../dataset/test_set"

types = ['wild oat']
type_ids = []

im = cv2.imread('/media/abanoublamie/5E76093A76091485/Grad/dataset/trainning_set/wild oat/IMG_6556.jpg')
im = cv2.resize(im, (960, 540))
roi = cv2.selectROI(im)
print(roi)

im_cropped = im[int(roi[1]):int(roi[1]+roi[3]), int(roi[0]):int(roi[0]+roi[2])]
cv2.imshow("Croped image", im_cropped)
cv2.waitKey(0) 