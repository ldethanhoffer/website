+++
banner = "banners/normal_eq.png"
thumbnail = "thumbnails/linear_regression.png"
categories = ['linear Regression']
date = "2019-02-03T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["linear regression", "linear algebra", "supervised learning"]
series = ["linear regression"]
title = "Coordinates: Regression the way we know it"
series_weight = 4
+++

In our post series on linear regression in machine learning, up to now, we have already done quite a bit of work: we first gave mathematical definition of [supervised learning] ( {{< ref "defining_supervised_learning.md" >}} ). We then described how to interpret the [concept of linear regression] ( {{< ref "introducing_regression_differently.md" >}} ) as a class of supervised learners. Along the way, we gave an overview of an important and underestimated tool in linear algebra: the [pseudo-inverse] ( {{< ref "disecting_pseudo-inverses.md">}} ).

Our approach discussed linear regression in the highest possible generality. We interpreted linear regression as the existence of a so-called _learned hypothesis_ : a linear map $h_\Delta: \mathfrak{x}\mapsto \mathfrak{y}$ between two finite dimensional inner product spaces $\mathfrak{X}$ and $\mathfrak{y}$...

Today, we introduce coordinates on the inner product spaces $\mathfrak{X}$ and $\mathfrak{y}$ and compute the matrix associated to the learned hypothesis $h_\Delta$. This matrix will indeed coincide with the  famous OLS matrix found in any book on [linear regression] (https://en.wikipedia.org/wiki/Linear_least_squares). 

Let's begin with recapping exactly what we mean by linear regression: as mentioned above, we'll start with two finite dimensional inner product spaces $\mathfrak{X}$ and $\mathfrak{y}$, together with a dataset $\Delta \subset \mathfrak{X}\times \mathfrak{y}$ of finitely many points such that the features $x \in \Delta$ span $\mathfrak{X}$.  
We'll write $\Delta = \big( (x_1,y_1), \ldots, (x_d,y_d) \big)$
 For any linear map $h \in \text{Hom}(\mathfrak{X},\mathfrak{y})$,  we define the cost function as
$$c(\Delta, h)=\sqrt{\sum\_{(x,y)\in \Delta} \vert \vert h(x)-y \vert \vert^2} $$
In our [second post]({{< ref "proving_linear_regression.md" >}}), we showed that there exists a unique linear map $h_\Delta$ which minimizes the value $c(\Delta, -)$.  

We also gave a more or less explicit description of this $h_\Delta$: look at the map
$$
\text{ev}\_\Delta: \text{Hom}(\mathfrak{X},\mathfrak{y})\longrightarrow \mathfrak{y}^\Delta: h\mapsto (h(x))\_{x\in \Delta}
$$
Then 
$$
h\_\Delta = \text{ev}^+\_\Delta ((y)\_{y\in \Delta})
$$
Where $\text{ev}^+$ is the [Moore-Penrose pseudo-inverse]({{< ref "disecting_pseudo-inverses.md" >}}) of $\text{ev}$.

Now, if we introduce coordinates on $\mathfrak{X}$ and $\mathfrak{y}$. then the space of liner maps $\textrm{Hom}\_{\mathbb{R}}(\mathfrak{X},\mathfrak{y})$ is naturally identified with the space of matrices $\text{Mat}\_{n\times m}(\mathbb{R})$ as we all know from basic linear algebra.  
 The space $\mathfrak{y}^\Delta$ is in turn naturally isomorphic to $\text{Mat}\_{d\times n}(\mathbb{R})$ (where $d=\vert \Delta \vert$). Using these two identifications, we can reinterpret $\text{ev}_{\Delta}$ as a linear map of the form:
$$
\overline{\text{ev}}\_\Delta: \text{Mat}\_{n\times m}(\mathbb{R})\longrightarrow \text{Mat}\_{d\times n}(\mathbb{R})
$$
We now have the following:

<div class = "lemma">
The above map is given by right multiplication by the matrix $X$ whose $k$-th column consists of the coordinates of the feature $x_k$ in the dataset $\Delta = \big( (x_1,y_1), \ldots, (x_d,y_d) \big)$
</div>


Moreover, it is  nothing more than an exercise in formality to show that the operation of taking the Moore-Penrose pseudo-inverse of a map is compatible with this reinterpration in the sense that
$$
\overline{\big(\text{ev}_\Delta^+\big)} = \bigg(\overline{\text{ev}\_\Delta}\bigg)^+
$$
Combining this with the above above lemma now yields that the linear map $\overline{\big(\text{ev}\_\Delta^+\big)}$ is simply given by multiplying by $X^+$. Now we recall that the learned hypothesis $h\_\Delta$ is given by evaluating $\text{ev}\_\Delta$ at the sequence $(y)\_{y \in \Delta}$. Putting everything together, we conclude that the matrix associated to $h\_\Delta$ is given by $Y\cdot X^+$ where $Y$ is the matrix whose column vectors are the coordinates of the labels $y_1,\ldots , y_d$.  


Summarizing, we obtain:

<div class = "theorem">
	The matrix corresponding to the learned hypothesis $h_\Delta$ is given by 
	$$
	Y\cdot X^+ = Y\cdot (X^t\cdot X)^{-1}\cdot X^t
	$$
	</div>

Note that the last equation follows from the fact that $X^+ = (X^t\cdot X)^{-1}\cdot X^t$ if the matrix $X$ is injective