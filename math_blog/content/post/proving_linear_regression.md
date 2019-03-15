+++
banner = "banners/pseudo_inverse_ev.png"
thumbnail = "thumbnails/linear_algebra.png"
categories = ['linear Regression']
date = "2017-05-20T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["linear regression", "linear algebra", "supervised learning"]
series = ["linear regression"]
title = "Proving Linear Regression"
series_weight = 2
+++


 [Last time]({{< ref "introducing_regression_differently.md" >}}), we introduced linear regression as a new class of [learners]({{< ref "defining_supervised_learning.md" >}}) which we called linear. Let's start with a little recap...  

 We considered a set of features $\mathfrak{X}$ together with labels which in turn took values in a finite-dimensional inner product space $\mathfrak{y}$.  We next considered any finite-dimensional subspace $\mathfrak{H}\subset \mathfrak{y}^\mathfrak{X}$ of the vector space of functions $\mathfrak{X}\longrightarrow \mathfrak{y}$ as the possible hypotheses as well as a dataspace $\mathfrak{D}$ consisting of finite subsets of $\mathfrak{X}\times \mathfrak{y}$ which [separate]({{< ref "introducing_regression_differently.md" >}}) the hypothesis space $\mathfrak{H}$. We finally associated to any dataset $\Delta \in \mathfrak{D}$ and any hypothesis $f \in \mathfrak{H}$ a cost which was simply the norm of the vector $\big(f(x)-y)\big)\_{(x,y) \in \Delta}$ in the space $\mathfrak{y}^\\Delta$ or more explicitely: 
 $$c(\Delta, f) = \vert \vert (f(x)-y)\_{(x,y)\in \Delta}\vert \vert\_{\mathfrak{y}^\Delta} =  \sum\_{(x,y) \in \Delta}\sqrt{\vert \vert f(x)-y\vert \vert^2\_\mathfrak{y}}$$
We then claimed (without proof )that this indeed defines a [sharp learner]({{< ref "defining_supervised_learning.md">}}) in the sense that for any dataset $\Delta \in \mathfrak{D}$, the learned hypothesis which by definition is given by $$h\_\Delta := \textrm{argmin}\_{f\ \in \mathfrak{H}} c(\Delta,f) $$
was indeed well defined  

The proof is actually rather easy, and today we will guide you through the steps:

Let's begin by recalling the following fact from linear algebra:

<div class = "lemma" >
Let $W\subset V$ be a subspace of a finite dimensional inner product space $V$. Then the following are equivalent:
<ol>
<li> the vector $ v-w$ is orthogonal to the subspace $ W$</li>
<li>$\vert \vert v-w\vert \vert \le \vert \vert v-u\vert \vert $  $, \forall u \in W$ </li>
</ol> 
Moreover, the vector $w$ satisfying either condition is necessarily unique
</div>

The above lemma tells us that the _projection_ onto the subspace $W$ defined as $\pi(v)=\text{argmin}\_{w \in W}\vert \vert v-w\vert \vert$ coincides with the other notion of _projection_ of onto the subspace $W$ by considering the decomposition of $V$ into $V=W\oplus W^{\perp}$ and writing $v = w+(v-w)$. We will call $w$ map _the_ projection of $v$ onto $W$ as no confusion can arise.  

In fact we'll be interested in a slight variation of the above definition: instead of a subspace, we'll consider a  linear map $f:V\longrightarrow W$ and assume that $W$ is now a finite dimensional inner product space. We let $U$ denote the subspace $U=\text{im}(f)\subset W$. Now, for any vector $w \in W$ we can ask what the projection of $w$ onto $U$ looks like. There is a very nice answer to this question:

<div class = "lemma">
The following are equivalent:
<ol>
	<li>$f(v)$ is the projection of $w$ onto $U$</li>
	<li>the vector $v \in V$ satisfies $(f^* \circ f)(v) = f^*(w)$ </li>
</ol>
The above equation is called the normal equation.
</div>
An important remark is that if the map $f$ is injective, this vector $v$ is necessarily unique! (since we know that $f(v)$ is unique by the previous lemma, and $f(v)$ can have only one pre-image by injectivity in this case). In this case we'll use the following notation to denote $v$:
$$
v= f^+(w)
$$
<center>
It turns out that this above lemma is exactly what we need to prove the promised claim of linear regression being indeed a sharp learner.<br><br>
</center>
 Here's how to do it:  
Assume the dataset $\Delta \in \mathfrak{D}$ is given.. Then $\Delta$ consists of a finite set of couples $(x,y)\in \mathfrak{X}\times \mathfrak{y}$ and separates $\mathfrak{H}$, in the sense that if $f$ and $g$ coincide on $\Delta$, then $f=g$.  

Now consider the map:  

<center>
$$\textrm{ev}_\Delta: \mathfrak{H}\longrightarrow \mathfrak{y}^\Delta: f \longrightarrow (f(x))_{x\in \Delta}$$
</center>  

Note that \( \mathfrak{y}^\Delta \) being a finite product of finite-dimensional inner product spaces is itself an inner product space!
Now, $\text{ev}_\Delta$ is clearly a linear map, so we let $U=\text{im}(\text{ev}_\Delta)$ denote the image subspace in $\mathfrak{y}^\Delta$. Now the separation condition of $\Delta$ translates exactly into the fact that $\text{ev}_\Delta$ is injective. We can thus apply the previous lemma to write:
$$h_\Delta = \text{ev}^+_\Delta\big((y)_{(x,y) \in \Delta}\big)$$

In other words, $h_\Delta$ is the unique hypothesis in $\mathfrak{H}$ such that $\textrm{ev}_\Delta (h_\Delta)$ is the projection of the labels $\big((y)_{(x,y)\in \Delta}\big)$ of the dataset onto the image of $\text{ev}_\Delta$ (it's a mouthful, I agree).  
The first lemma now implies that this in turn is equivalent to 
$$ h_\Delta =\text{argmin}_{f\in U}\vert \vert \text{ev}_\Delta(f)-(y)_{(x,y) \in \Delta} \vert \vert_{\mathfrak{y}^\Delta}$$ 
But that in turn is equivalent to 
$$= \text{argmin}_{f\in U}\vert \vert \big(f(x)_{(x,y)\in \Delta}\big)-\big((y)_{(x,y) \in \Delta}\big) \vert \vert_{\mathfrak{y}^\Delta}=\vert \vert (f(x)-y)_{(x,y)\in \Delta}\vert \vert_{\mathfrak{y}^\Delta}$$ 
Which is exactly what we wanted!  

We can summarize:

<div class ="theorem">
The setup $\bigg(\mathfrak{X},\mathfrak{y},\mathfrak{H},\mathfrak{D},c\bigg)$ where $\mathfrak{X}$ is any set, $\mathfrak{y}$ a finite-dimensional inner product space $\mathfrak{H}\subset \mathfrak{y}^\mathfrak{X}$ a finite-dimensional subspace, $\mathfrak{D}$ consists of finite subsets of $\mathfrak{X}\times \mathfrak{y}$ that separate $\mathfrak{H}$ and $c(\Delta, f) = \vert \vert \big(f(x)-y\big)_{(x,y\in \Delta}\vert \vert_{\mathfrak{y}^\Delta}$ defines a sharp learner.  
The learned hypothesis is given as
$$
h_\Delta = \text{ev}_\Delta^+\big((y)_{(x,y) \in \Delta}\big)
$$
where
$$
\text{ev}_\Delta: \mathfrak{H}\longrightarrow \mathfrak{y}^\Delta: f \mapsto (f(x))_{x\in \Delta}$$

</div>
