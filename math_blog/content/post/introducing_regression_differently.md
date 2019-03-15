+++
banner = "banners/linear_learner_cost.png"
thumbnail = "thumbnails/linear_regression.png"
categories = ['Defining supervised learning']
date = "2017-05-20T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["linear regression", "supervised learning"]
series = ["linear regression"]
title = "Introducing linear regression..a little differently"
series_weight = 1
+++

Anyone who's taken an intro to statistics class is familiar with the basic concept of linear regression...  

The quintessential example is guessing house prices: let's say you go around houses in your neighborhood collecting some data on each house (the square footage, the number of bedrooms, the size of the yard and the age of the house for example). You also ask your neighbors the selling price for each house. The idea is to estimate the selling price of your own house based off the info you gathered...  

How?  

Well, the data of each house essentially forms a point in the vector space $\mathbb{R}^4$. The price of the house in turn is a value in the vector space $\mathbb{R}$. The technique of linear regression now produces a linear map $h: \mathbb{R}^4\longrightarrow \mathbb{R}$ that _'best describes the data'_. Your own selling price should now be the value of $h$ when you plug in the paramaters of your own house.  

In this first post on linear regression, we intend to do two things:

1. Show you how we can take this example and generalize it _immensely_
2. Describe how this generalization fits nicely in the language of [supervised learners]( {{< ref "defining_supervised_learning.md" >}} ) we defined before


Let's begin by working out our house price example in a little more detail, introducing some terminology along the way:  
The sample of houses will be the _dataset_ $\Delta$ consisting of elements $(x,y)$ where the _feature_ $x \in \mathbb{R}^4$ contains all the information of the house and the _label_ $y$ is the corresponding selling price of the house. Saying that $h$ _fits the data $\Delta$ best_ means that $h$ predicts the selling price  $y$ from the feature $x$ as accurately as possible. In other words, for all houses, the error in prediction $\big(h(x)-y\big)$ must be minimized according to some cost.  

The most elegant way to do this is to view the sequence $v= \big(h(x)-y\big)_{(x,y)\in \Delta}$ as a single vector in the vector space $\mathbb{R}^{\vert \Delta \vert}$ and to consider the obvious norm on $\mathbb{R}^{\vert \Delta \vert}$. In other words, we wish to find the  function $h$ that minimizes  the value $$\vert \vert v \vert \vert = \sqrt{\sum _{(x,y)\in\Delta}\big( h(x)-y\big)^2}$$  
Any standard textbook in statistics will now tell you that as long as the features $x \in \Delta$ span the the vector space $\mathbb{R}^4$, there always exists a unique $h$ that minimizes $\vert \vert v\vert \vert$. They'll usually tell you that this $h$ corresponds to a $1\times 4$ matrix and there is something called the normal equation that provides you with the unique solution. More on that [later]({{< ref "introducing_coordinates.md" >}})...  

Now, let's take this example one step further: the fact that the features and labels were elements of the sets $\mathbb{R}^4$ and $\mathbb{R}$ is of course totally irrelevant. Instead, we only need two finite-dimensional vector spaces, say $V$ and $W$ respectively, which are equipped with an inner product (this so that we can talk about the hypothesis _best fitting the data_ later on).  
In our more general linear regression, we again begin with a dataset $\Delta \subset V \times W$ consisting of points $(x,y)$ and wish to find the hypothesis $h \in \text{Hom}\_{\mathbb{R}}(V,W)$ that fits $\Delta$ best. Again, let's look at all the errors in predictions $v= \big( h(x)-y\big)\_{(x,y)\in \Delta}$ as a single vector $v$ in the vector space $W^{\vert \Delta \vert}$. It's well know that $W^{\vert \Delta \vert}$  carries a natural inner product space with norm  

$$
\vert \vert v \vert \vert\_{W^{\vert \Delta \vert}} = \sqrt{ \sum_{(x,y)} \vert\vert h(x)-y \vert\vert_W^2}
$$
So in this more general example, we'll want to find $h$ that minimizes the above quantity  

In the [next post]({{< ref "proving_linear_regression.md" >}}) we will outline the proof that this map $h$ exists uniquely as long as the features $x \in \Delta$ span the vector space $V$!  

Now, the very careful reader will spot that there is one more level of generality we can consider: Indeed, the above norm really only depends on the inner product in the vector space $W$. The problem thus only requires $W$ to be an inner product space (in other words it's independent of the norm on $V$)  

So -in principle- we could simply consider any dataset $\Delta \in \mathfrak{X}\times \mathfrak{y}$ where $\mathfrak{X}$ is __any set__ , $\mathfrak{y}$ a finite-dimensional inner product space, and consider the analgous linear regression problem for this dataset.  

One first hurdle would be to answer the question:
<center>
What does the word linear mean in this context?
</center>

There's an easy way to answer this: the set of functions $\mathfrak{X}^\mathfrak{y}$ is naturally a vector space. We now pick _any_ subspace $\mathfrak{H}$ of $\mathfrak{X}^\mathfrak{y}$ that is finite-dimensional. 
The new linear regression context now asks to find a unique function $h \in \mathfrak{H}$ which minimizes the norm:
$$
\vert \vert v \vert \vert\_{\mathfrak{y}^{\vert \Delta \vert}} = \sqrt{\sum_{(x,y)\in\Delta}\vert \vert  h(x)-y\vert \vert\_{\mathfrak{y}}^2}
$$

In the above two examples we needed a little extra condition (the features in $\Delta$ need to span the vector space). We can easily translate this condition as follows:
<div class = 'definition'>
We say that a dataset $\Delta \subset \mathfrak{X}\times \mathfrak{y}$ separates the space $\mathfrak{H}\subset \mathfrak{X}^\mathfrak{y}$ if for any two functions $f,g \in \mathfrak{H}$, we have $$f\_\Delta = g\_\Delta \implies f = g$$
</div> 

The [next post]({{< ref "proving_linear_regression.md" >}}), we will also prove that under the condition of separation, a unique $h \in \mathfrak{H}$ indeed minimizes the above norm.  

Summing up: 
<div class = 'lemma'>
Let $\mathfrak{X}$ be any set and $\mathfrak{y}$ be any finite dimensional inner product space. Let $\mathfrak{H}\subset \mathfrak{X}^\mathfrak{y}$ be any finite dimensional subspace. Then for any finite set $\Delta \in \mathfrak{X}\times \mathfrak{y}$ that separates $\mathfrak{H}$, there exists  a unique $h\_\Delta \in \mathfrak{H}$ such that 

$$
\vert \vert h(x)-y \vert \vert\_{\mathfrak{y}^\Delta} = \sqrt{\sum\_{(x,y)} \vert \vert h(x)-y\vert \vert\_{\mathfrak{y}}^2}
$$

is minimal
</div>
As promised above, we will also reformulate the above lemma in the context of our theory of [learners]( {{< ref "defining_supervised_learning.md" >}})  .  
Recall that a sharp learner consists of a set of features $\mathfrak{X}$, a set of labels $\mathfrak{y}$, together with a hypothesis space given as a set $\mathfrak{H}\subset \mathfrak{y}^\mathfrak{X}$, a dataspace $\mathfrak{D}$ consisting of finite subsets of $\mathfrak{X}\times \mathfrak{y}$ and a cost function $c: \mathfrak{D}\times \mathfrak{H}\longrightarrow \mathbb{R}$ for which the function $h\_\Delta = \textrm{argmin}\_{f \in \mathfrak{H}}c(\Delta,f)$ is well defined..  

We can now restate the above lemma as follows:

<div class = 'theorem' >
(Linear regression)  
Let $\mathfrak{X}$ be any set and $\mathfrak{y}$ be any finite dimensional inner product space. Let $\mathfrak{H}\subset \mathfrak{X}^\mathfrak{y}$ be any finite dimensional subspace and assume $\mathfrak{D}$ consists of finite $\Delta \subset \mathfrak{X}\times \mathfrak{y}$ that separate $\mathfrak{H}$.  
Let 
$$c: \mathfrak{D}\times \mathfrak{H}:(\Delta, f) \mapsto \vert \vert h(x)-y\vert \vert_{\mathfrak{y}^\Delta}$$
Then $(\mathfrak{X}, \mathfrak{y},\mathfrak{H},\mathfrak{D},c)$ defines a sharp learner called a linear learner
</div>

Of course our second example provides a specific construction of such a linear learner:

<div class = 'example'>
Let $\mathfrak{X}$ be a finite dimensional inner-product space, let $\mathfrak{H}=\textrm{Hom}_{\mathbb{R}}(\mathfrak{X},\mathfrak{y})$ and let $\mathfrak{D}$ be the set of all finite $\Delta\subset \mathfrak{X}\times \mathfrak{y}$ such that $\{x \in \Delta\}$ spans $\mathfrak{X}$. Then $\mathfrak{H}$ is surely finite dimensional and each $\Delta$ surely separates $\mathfrak{H}$ (since any linear map is completely defined on a spanning set).<br><br>

The conditions of the above theorem are thus satisfied and we have thus constructed a linear learner. We will call these types of linear learners <b> Euclidean </b> (as $\mathfrak{X}$ is itself a Euclidean space) 
</div>
