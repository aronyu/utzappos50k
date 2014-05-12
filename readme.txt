================================================================================
    UT Zappos50K Shoe Dataset (ver 1.1)
================================================================================

UT Zappos50K is a large shoe dataset consisting of 50,025 catalog images 
collected from Zappos.com. This dataset is created in the context of an online 
shopping task, where users care specifically about fine-grained visual 
differences. The images are mostly 136 x 102 pixels. The shoes are centered on 
a white background and pictured in the same orientation for convenient analysis.

The images are stored in a tree structure. The relative paths to the images are 
stored in the matrix below:

  image-path.mat :: Cell array containing the relative path to each image.

  
This dataset is created for our work on fine-grained attribute comparison and 
is made available for non-commercial use only. If you use this dataset in a 
publication, please cite the following paper:

  Aron Yu and Kristen Grauman. "Fine-Grained Visual Comparisons with Local 
  Learning". In CVPR, 2014.

BibTeX:

@inproceedings {fine-grained,
  author = {A. Yu and K. Grauman},
  title = {{F}ine-{G}rained {V}isual {C}omparisons with {L}ocal {L}earning},
  booktitle = {Computer Vision and Pattern Recognition (CVPR)},
  month = {June},
  year = {2014}
}

--------------------------------------------------------------------------------
    | Image Features
--------------------------------------------------------------------------------

  zappos-gist.mat :: 960-dimensional GIST descriptors (50025 x 960).

  zappos-color.mat :: 30-dimensional LAB color histogram (50025 x 30).


--------------------------------------------------------------------------------
    | Relative Attributes Labels
--------------------------------------------------------------------------------

  zappos-labels.mat :: Regular comparison label matrix (UT-Zap50K-1).

  zappos-labels-fg.mat :: Fine-grained comparison label matrix (UT-Zap50K-2).


There are human annotations from Amazon Mechanical Turk (mTurk) for 4 relative 
attributes: "open", "pointy at the toe", "sporty", and "comfort".

Columns of the label matrix (N x 6):
  (1) Image index of the first image.
  (2) Image index of the second image.
  (3) Attribute ID: 1 = open, 2 = pointy, 3 = sporty, 4 = comfort.
  (4) Comparison label: 1 = 1st image has *more* attribute than 2nd image
                        2 = 2nd image has *more* attribute than 1st image
                        3 = both images have the attribute equally
  (5) Average confidence score: 1 = very confident
                                2 = somewhat confident
                                3 = not confident
  (6) Agreement score: Percent of mTurk workers who gave the majority vote.
  
Images are indexed w.r.t. their ordering in the image path vector. (e.g. Image 
#1 has CID 100627-72.) Each pair of images is labeled by 5 unique mTurk workers. 
Comparison labels are assigned based on majority vote and the confidence scores 
are averaged. Pairs with low confidence (< 2) and low agreement (< 0.5) have 
been pruned.

  e.g. 44836 5597 3 2 1 1
  Image #5597 is more "sporty" than Image #44836. All workers are very 
  confident in their decisions and are in full agreement.

The labels are divided s.t. each cell contains the label matrix for a single 
attribute. Each row in the matrix represent a single pair of shoe images with 
its corresponding attribute.

Note: Label matrices are best viewed in Matlab using 'format short g'.


--------------------------------------------------------------------------------
    | Meta-data Labels
--------------------------------------------------------------------------------

  meta-data.csv :: Raw enum labels taken from Zappos.com.

  meta-data.mat :: Cell array containing the enum labels.

  meta-data-bin.csv :: Binary labels expanded from enum labels. Each type 
                       within an enum has its own label. 


Each row in the CSV file represents a different shoe. There are 8 possible 
enum labels and they are described below. Each shoe is not guaranteed to have
all labels, except for the labels Category and SubCategory. Some shoes can have
multiple types within a single enum label, separated by semicolons.

  CID: Image ID in the form of ProductID-ColorID, where ProductID is the 
       Zappos product identifier. There can be several shoes of the same kind
       (same ProductID) but in different colors.

  Category: Broad category name assigned by Zappos.

  SubCategory: Specific sub-category name assigned by Zappos.

  HeelHeight [opt]: Height of the heel. 
        
  Insole [opt]: Materials used to make the insole. 

  Closure [opt]: Mechanisms to enclose the foot.

  Gender [opt]: Recommended gender for the shoe.

  Material [opt]: Materials used to make the shoe.

  ToeStyle [opt]: Style at the front of the shoe.


--------------------------------------------------------------------------------
    | Fine-Grained Rationales (Coming soon...)
--------------------------------------------------------------------------------

In addition to the comparison labels, we also collected annotator rationales 
for the fine-grained pairs. Each mTurk worker must give a 1 sentence/phrase 
reasoning on *why* he/she made the particular fine-grained decision (also acts 
as quality control). Each fine-grained pair has rationales from 5 workers.


--------------------------------------------------------------------------------
    | Train-Test Splits
--------------------------------------------------------------------------------

  train-test-splits :: Indexes of the training and testing sets w.r.t. the 
                       provided comparison labels. The first level of cells 
                       represents attributes and the second level of cells 
                       represents the individual splits.
  

We provide the train/test splits used to produce the results in our paper. We
also provide a demo script to help with experimental setup for a single split 
on a single attribute. There are 10 splits for each of the 4 attributes. Please 
insert you own learning functions into the scripts.


--------------------------------------------------------------------------------
    | Download Contents
--------------------------------------------------------------------------------

  ut-zap50k-data.zip :: All relevant data for this dataset.
  
  ut-zap50k-feats.zip :: GIST + Color features for each image.
  
  ut-zap90k-images.zip :: Full set of 50,025 colored shoe images.
  

--------------------------------------------------------------------------------
    | Contact Info
--------------------------------------------------------------------------------

For a detailed usage of this dataset, please refer to our paper and visit our 
project webpage at vision.cs.utexas.edu/projects/finegrained

If you have any questions, please contact Aron Yu at aron.yu@utexas.edu


--------------------------------------------------------------------------------
    | Acknowledgement
--------------------------------------------------------------------------------

We thank Mark Stephenson for his help creating this dataset.

