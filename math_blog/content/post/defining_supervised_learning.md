+++
banner = "banners/learning_condition.png"
thumbnail = "thumbnails/supervised_learning.png"
categories = ['Defining supervised learning']
date = "2017-05-20T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["supervised learning"]
title = "Defining Supervised Learning"
series = ["supervised learning"]
+++

In this inaugural post of the mathvsmachine blog we will introduce a mathematical definition that encaptures the idea of supervised learning. This definition is close to the one found in the [literature] (https://en.wikipedia.org/wiki/Supervised_learning#How_supervised_learning_algorithms_work), just stated just a little more precisely.  In this way, we'll ibe able to not only prove that the algorithms we all know and love indeed fit this definition, but in time expand and build a fully fledged theory of supervised learners<br><br>
So without further ado, we'll recal the main paradigm of supervised learning: start with a finite dataset which is split into features and labels and ask whether we can find some hypothesis that associates to each feature a label that best describes the given dataset in a certain way.

Let's dissect that sentence a little more...<br><br> 
We'll denote the set of features by $\mathfrak{X}$ and the set of labels by $\mathfrak{y}$. The space of all possible  datasets $\mathfrak{D}$ will simply be a choice of certain sets -we'll denote each by $\Delta$. The condition that each should be finite and split into features and labels in turn means that we should be looking at some finite subsets of $\mathfrak{X}\times \mathfrak{y}$. In other  words $\mathfrak{D}$ is a subset of  $ \text{Fin}(\mathfrak{X\times \mathfrak{y}})$ the set of relations from $\mathfrak{X}$ to $\mathfrak{y}$.<br>
We next introduce the space $\mathfrak{H}\subset \mathfrak{y}^\mathfrak{X}$ of _hypotheses_ which consists of a choice of functions $f: \mathfrak{X}\longrightarrow \mathfrak{y}$ that describe the possible ways we may wish to assign a label to a feature.<br><br>
A supervised learner now assigns to any dataset $\Delta \in \mathfrak{D}$ an optimal choice of hypothesis $h\_\Delta \in \mathfrak{H}$ (we'll call this the learned hypothesis). In other words, it's given by a function $$h:\mathfrak{D}\longrightarrow \mathfrak{H}: \Delta\mapsto h_\Delta$$
To capture the idea that the learned hypothesis $h\_\Delta$ _describes_ the data $\Delta$ optimally,
we introduce a _cost function_ , which intuitively quantifies just how close the hypothesis $f$ matches a dataset $\Delta$. In other words, it assigns a real number $c\in\mathbb{R}$ to any choice of dataset $\Delta \in \mathfrak{D}$ and _any_ hypothesis $f \in \mathfrak{H}$:  $$c: \mathfrak{D}\times \mathfrak{H}\longrightarrow \mathbb{R}: (\Delta,f)\mapsto c(\Delta,f)$$
The idea that the choice of hypothesis $h\_\Delta$ fits the data best now translates to the fact that the choice $h\_\Delta$ minimizes the cost:
$$
	c(\Delta,h\_\Delta)=\min_{f\in \mathfrak{H}} c(\Delta,f)
$$
We'll call this condition the _learning condition_.<br><br>
Summarizing, we obtain the following:  



<div class="definition" id = 'supervised-learner'>
A (supervised) learner consists of a tuple $(\mathfrak{X},\mathfrak{y},\mathfrak{D},\mathfrak{H},h,c)$ where $\mathfrak{D}\subset \textrm{Fin}(\mathfrak{X},\mathfrak{y})$, $\mathfrak{H}\subset \mathfrak{y}^{\mathfrak{X}}$ and $h:\mathfrak{H}\longrightarrow \mathfrak{D}$, $c: \mathfrak{D}\times \mathfrak{H}\longrightarrow \mathbb{R}$ are functions so that the condition
$$
	c(\Delta,h_\Delta)=\min_{f \in \mathfrak{H}} c(\Delta,f)
$$
is satisfied
</div>
Of course, the choice of learned hypothesis $h_\Delta \in \mathfrak{H}$ need not be unique, there could be a number of hypotheses that minimize the cost. In the case where there is a unique hypothesis satisfying the learning condition, we call the learner _sharp_:

<div class = 'definition'>
	 A sharp learner is a learner satisfying
	 $$
	 h_\Delta = \text{argmin}_{f\in \mathfrak{H}}c(\Delta,f)
	 $$
</div>

