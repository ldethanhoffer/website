+++
banner = "banners/diagram.png"
thumbnail = "thumbnails/linear_regression.png"
categories = ['linear Regression']
date = "2019-01-15T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["linear regression", "linear algebra", ]
series = ["linear regression"]
title = "Disecting Pseudo-inverses"
series_weight = 3
+++

Welcome to the third installment of our post series on linear regression...our way!!  

Let's start by recapping what we already discussed:  

In the [first post]( {{< ref "introducing_regression_differently.md" >}} ), we explained how to define linear regression as a supervised learner: Let $\mathfrak{X}$ be a set of features and $\mathfrak{y}$ a finite dimensional inner product space. Pick $\mathfrak{H} \subset \text{Hom}\_{\mathbb{R}}(\mathfrak{X},\mathfrak{y})$ to be any finite dimensional subspace of functions as well as a  collection $\mathfrak{D}$ of finite datasets $\Delta \subset \mathfrak{X}\times \mathfrak{y}$ that _separate_ $\mathfrak{H}$ in the sense that any $h \in \mathfrak{H}$ is uniquely determined by its restriction on $\Delta$.  
 Finally, define a cost function as follows
$$
c: \mathfrak{D}\times \mathfrak{H}:(\Delta, f)\mapsto \vert \vert (f(x)-y)\_{(x,y)\in\Delta}\vert \vert\_{\mathfrak{y}^\Delta}=\sqrt{\sum\_{(x,y)\in \Delta}\vert \vert f(x)-y\vert\vert_{\mathfrak{y}}}
$$  

Then this defines a sharp learner in the sense that 
$$
h\_\Delta = \textrm{argmin}\_{f \in \mathfrak{H}} c(\Delta, f)
$$
Is well defined.  

In the [second post]({{< ref "proving_linear_regression.md" >}}), we explained how to go about proving this result.  
Specifically, we showed how to _construct_ this hypothesis $h_\Delta$:  

Look at the following map:
$$
\text{ev}\_{\Delta}: \mathfrak{H}\longrightarrow \mathfrak{y}^\Delta: f\mapsto (f(x))_{x \in \Delta}
$$ 
and consider the image subspace $\text{im}(\text{ev}\_\Delta)\subset \mathfrak{y}^\Delta$. Then let $h\_\Delta$ is the projection of the labels $(y)\_{y \in \Delta}$ onto $\text{im}(\text{ev}\_\Delta)$. In the [previous  post]({{< ref "proving_linear_regression.md" >}}), we denoted this projection by $\text{ev}^+\big( (y)\_{y \in \Delta}\big)$.  

Today, we explain how this $+$ sign is much more than just a piece of notation. There is in fact some very elegant mathematics lurking in the background in the form of [Moore-Penrose pseudo-inverses](https://en.wikipedia.org/wiki/Moore–Penrose_inverse) !  

To make the exposition clearer, we will define them in the more general context of linear maps $f:V\longrightarrow W$ between finite dimensional vector spaces.  The motivating question here is the simple observation that $f$ need not be invertible, but instead we could ask:

<center> 
Is it possible to define a more general notion of  _"inverse"_  to $f$ in a natural way ?
</center>

the starting point of the answer is the fact that $f$ is invertible if and only if 2 things happen:  the kernel has to be  nonzero and  the image has to coincide with $W$. Now, whether or not this is the case, we can always restrict $f$ cleverly so as to avoid those two issues:

<div class = 'lemma'>
 Let $U_V \subset V$ and $U_W \subset W$ be such that $\ker(f)\oplus U_V=V$ and $\textrm{im}(f)\oplus U_W=W$. Then
 $
f:U_V\longrightarrow \textrm{im}(f)
 $
is invertible
</div>

In other words, at the very least, the map $f$ indeed does have a (restricted) inverse $f^\sharp: \textrm{im}(f)\longrightarrow U_V$.  
Actually it turns out that we can always lift $f^\sharp$ to a map on the whole of $W$ in a unique way!  
More precisely, if we let $\pi\_{\textrm{im}(f)}: W \longrightarrow \textrm{im}(f)$ be the canonical projection (remember that we decomposed $W=\text{im}(f)\oplus U_W$ above), we have:


<div class = 'lemma'>
There exists a unique map $f^\star : W \longrightarrow U_V$ such that $\pi_{\textrm{im}(f)}\circ f^\star=f^\sharp $ (or equivalently $f\circ f^{\star}=\pi_{\textrm{im}(f)})$
</div> 
We'll use a little abose of notation and write $f^\star=f^\sharp$ (since they both coincide on $\textrm{im}(f)$).<br><br>
To reinterpret the above lemma in a slightly more elegant way however, we'll bundle the components $U_V$ and $U_W$ together and define the set $\Lambda(f)$ as :  

$$
\{(U_V,U_W) \vert \, \ker(f)\oplus U_V=V \textrm{ and }\textrm{im}(f)\oplus U_W=W  \}
$$


So that we now have an assignment

$$
\Phi: \Lambda(f)\longrightarrow \textrm{Hom}(W,V):(U_V,U_W)\mapsto f^\sharp
$$

We can now make the following definition:
<div class = "definition">
Let $(U_V,U_W) \in \Lambda(f)$.<br>
Then we call $f^\sharp = \Phi(U_V,U_W)$ the pseudo-inverse to the triple $(U_V,U_W,f)$.<br>  
We call $g \in \textrm{Hom}(W,V)$ a pseudo-inverse to $f$ if $g \in \textrm{im}(\Phi)$.<br> 
We'll denote the set of pseudo-inverses to $f$ by $\Pi(f)$
</div>
The above definition naturally raises a few questions:<br>  


1.  Can we find properties that characterize the set $\Pi(f)$ of pseudo-inverses to $f$?<br>
2.  Is the assignment $\Phi$ one-to-one?<br><br>

It turns out that both question can be answered postively.  
The key insight here is to realize that we can retrieve the components $U_V$ and $U_W$ from a pseudo-inverse as follows: 

<div class = "lemma">
 if $f^\sharp$ is the pseudo-inverse to $(U_V,U_W,f)$, then we necessarily have 
$$
 U_V=\textrm{im}(f^\sharp) \text{ and } U_W=\ker(f^\sharp)
 $$
</div>
This lemma thus allows us to write a tentative inverse to  the map $\Phi$ as
$$
\Psi: \Pi(f)\longrightarrow \Lambda(f): g\mapsto \big(\text{im}(g),\ker(g)\big)
$$
Indeed, we now have:
<div class = "theorem">
The maps $\Phi$ and $\Psi$ are mutual inverses.

</div>
We now go on to question 2: how do we characterize the set $\Pi(f)$ of pseudo-inverses to $f$?
The definition of pseudo-inverse already shows that any $g \in \Pi(f)$ satisfies $f\circ g = \pi_{\text{im}(f)}$, ie $(f\circ g) =\text{Id}$ on $\text{im}(f)$. This however is not enough, snce we wish to encapsulate that $g: W\longrightarrow V$ takes values in $U_V$. Since $g$ is the inverse of $f$ on $U_V$, this implies that $(f\circ g)= \textrm{Id}$ on $U_V$ (which coincides with $\textrm{im}(g)$ by the above). We now have:  
<div class = "theorem">
The map $g$ is a pseudo-inverse to $f$  iff $(g \circ f)_{\text{im}(g)} =\text{Id}$ and $(f\circ g)_{\text{im}(f)}=\text{Id}$.<br> 
In other words: $$\Pi(f)=\{g\in \textrm{Hom}(W,V)\, \vert (f\circ g)_{\textrm{im}(f)}=id\, (g\circ f)_{\textrm{im}(g)}=id\}$$
</div>

This gives another characterization of the pseudo-inverse, namely as a map $\textrm{Hom}(W,V)$ that indeed behaves like an inverse to $f$ on the images of the respective functions.  
Summarizing the above theorem, we know that a pseudo-inverse now corresponds to the data of two complementary subspaces $(U_V,U_W)$. Now, we may wonder if there is a canonical choice of such complements...
In general of course the answer is no, but if we assume that $V$ and $W$ carry a little more structure, there is something that can be done...<br><br> So, let's now assume that $V$ and $W$ are finite-dimensional _inner product_ spaces. (we'll denote the inner product by $\langle -,-\rangle$ throughout), then we know that for any subspace $U\subset V$, we always have $U\oplus U^\perp =V$. We can thus define:

<div class = 'definition'>
The Moore-Penrose pseudo-inverse to $f$ is the pseudo-inverse $f^+$ of the triple $(\ker(f)^\perp,\textrm{im}(f)^\perp,f)$
</div>

There is of course one last question tht needs to be answered: how do we pick out the Moore penrose inverse from the set of pseudo-inverses $\Pi(f)$?

<div class = 'theorem'>
	The following are equivalent:
	<ol>
		<li>$f^+ \in \textrm{Hom}(W,V)$ is the Moore-Penrose pseudo-inverse to $f$</li>
		<li>$(f\circ g)_{\textrm{im}(f)}=\textrm{Id}\, (g\circ f)_{\textrm{im}(g)}=\textrm{Id}$ and $(f\circ g)$ and $g\circ f$ are self-adjoint linear maps </li>
	</ol>
</div>

The above four properties are what Wikipedia takes as the definition of Moore-Penrose pseudo-inverse, but it turns out that there as a much more natural way of interpreting them!
