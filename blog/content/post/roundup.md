+++
banner = "banners/normal_eq.png"
thumbnail = "thumbnails/linear_regression.png"
categories = ['linear Regression']
date = "2019-03-04T11:58:06+02:00"
description = ""
images = ""
menu = ""
tags = ["linear regression", "linear algebra", "supervised learning"]
series = ["linear regression"]
title = "Roundup"
series_weight = 5
+++

We have finally arrived at the last post of our series of the proof that [linear regression] ({{< ref "introducing_regression_differently.md" >}}) indeed is a 
[sharp learner]({{< ref "defining_supervised_learning.md">}}).

Recall that in [the first post] ({{< ref "introducing_regression_differently.md" >}}) we began by motivating linear regression as a problem on *predicting house prices* and quickly came to understand there was a beautiful way to frame this probem abstractly:
<center>
given any set of features $\mathfrak{X}$ and fd Euclidean space of labels $\mathfrak{y}$, as well as dataspace $\mathfrak{D}$ satisfying the separation condition for a finite dimensional hypothesis space $\mathfrak{H}\subset \mathfrak{y}^{\mathfrak{X}}$, is it possible to find a map $$h:\mathfrak{D} \longrightarrow \mathfrak{H}$$ such that $c(\Delta, h\_\Delta)=\min\_{h \in \mathfrak{H}} c(\Delta,h)$ where
$$
c(\Delta, h)=\sum_{(x,y)\in \Delta}\vert \vert y-h(x)\vert\vert^2
$$
</center>

Wen then proved in [a subsequent post] ({{< ref "proving_linear_regression.md" >}}) that this claim was indeed true. This relied heavily on a lesser known linear algebraic object called the [pseudo-inverse]({{< ref "disecting_pseudo-inverses.md">}})

Finally, we introduced coordinates on the feature space $\mathfrak{X}$ and label-space $\mathfrak{y}$ and showed in this case that all is right with the world so that indeed the solution to linear regression is given by the [normal equation] ({{< ref "introducing_coordinates.md">}}).


Thanks very much for following the series!

