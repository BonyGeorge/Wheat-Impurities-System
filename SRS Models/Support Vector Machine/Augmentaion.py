
import tensorflow as tf
from keras.preprocessing.image import ImageDataGenerator, array_to_img, img_to_array, load_img
import numpy as np
'''
train_datagenarator = ImageDataGenerator(featurewise_center=False,  # set input mean to 0 over the dataset
                                        samplewise_center=False,  # set each sample mean to 0
                                        featurewise_std_normalization=False,  # divide inputs by std of the dataset
                                        samplewise_std_normalization=False,  # divide each input by its std
                                        zca_whitening=False,  # apply ZCA whitening
                                        rotation_range = 30,  # randomly rotate images in the range (degrees, 0 to 180)
                                        zoom_range = 0.2, # Randomly zoom image 
                                        width_shift_range=0.1,  # randomly shift images horizontally (fraction of total width)
                                        height_shift_range=0.1,  # randomly shift images vertically (fraction of total height)
                                        horizontal_flip = True,  # randomly flip images
                                        vertical_flip=False)  # randomly flip images))


trainning_set = train_datagenarator.flow_from_directory('/home/abanoublamie/Graduation_Project/test_data/train',
                                                         batch_size = 15,
                                                         class_mode = 'binary',
                                                         save_prefix='N',
                                                         save_format='jpeg',
                                                         save_to_dir='/home/abanoublamie/Graduation_Project/test_data/train/Wild Oats')

trainning_set.next()   
'''
test_datagenarator = ImageDataGenerator(featurewise_center=False,  # set input mean to 0 over the dataset
                                        samplewise_center=False,  # set each sample mean to 0
                                        featurewise_std_normalization=False,  # divide inputs by std of the dataset
                                        samplewise_std_normalization=False,  # divide each input by its std
                                        zca_whitening=False,  # apply ZCA whitening
                                        rotation_range = 30,  # randomly rotate images in the range (degrees, 0 to 180)
                                        zoom_range = 0.2, # Randomly zoom image 
                                        width_shift_range=0.1,  # randomly shift images horizontally (fraction of total width)
                                        height_shift_range=0.1,  # randomly shift images vertically (fraction of total height)
                                        horizontal_flip = True,  # randomly flip images
                                        vertical_flip=False)  # randomly flip images)

test_set = test_datagenarator.flow_from_directory('/home/abanoublamie/Graduation_Project/test_data/test',
                                                    batch_size = 5,
                                                    class_mode = 'binary',
                                                    save_prefix='N',
                                                    save_format='jpeg',
                                                    save_to_dir='/home/abanoublamie/Graduation_Project/test_data/test/Wild Oats')
test_set.next()                                              