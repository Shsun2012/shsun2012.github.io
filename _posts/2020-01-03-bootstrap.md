---
layout: post
title: "Bootstrap in R"
subtitle: 'Notes'
author: "Shsun"
header-style: text
tags:
  - R
---
Bootstrapping method in R is convenient with the boot package.

##### What is bootstrap
Bootstrap is used to estimate quantity of a population by sampling with replacement. This is done by repeatedly taking relatively small samples, calculating the statistics, and taking the average fo the calculated statistics. A useful feature of the bootstrap method is that the resulting sample of estimation often forms a Gaussian distribution. A confidence interval can be calculated and used to bound the presented estimate, which can be used to present the estimated skill of a machine learning model. There are several forms of bootstrap: non-parametric, parametric, residual sampling, etc. Here we talk about the **non-parametric bootstrap**, or case resampling. All original observations have equal probability of being drawn into a sample.

Bootstrapping is often used for calculating confidence intervals (**CI**) and estimation of the standard errors, and estimating the bias of the point estimates. Methods for bootstrap CI include basic bootstrap, percentile bootstrap, studentized bootstrap, bias corrected and accelerated bootstrap (**BCa**). BCa adjusts for both bias and skewness in the bootstrap distribution, which is accurate in a wide variety of settings and produces reasonably narrow intervals. 

Increasing the number of samples doesn't lead to better representation of the original dataset. It can only reduce the effects of random sampling errors. It is recommentded to use the bootstrap method when ([wiki](https://en.wikipedia.org/wiki/Bootstrapping_(statistics))):  
 - The theoretical distribution of a statitic of interest in complicated or unknown.
 - The sample size is insufficient for straightforward statitical inference. If the underlying distribution is well-known, bootstrapping provides a way to account for the distortions caused by biased sampling.
 - Power calculations have to be performed, and a small pilot sample is available.  



##### How to use bootstrap method in R
There are two parameters: the size of the sample and the number of repetitions. In machine learning, it is common to use a sample size that is the same as the original dataset. The number of repitations must be large enough to ensure that meaningful statistics can be calculated on the sample.

Using the [boot](https://www.rdocumentation.org/packages/boot/versions/1.3-23?tap_a=5644-dce66f&tap_s=10907-287229) package in R as the following steps:
1. Define a function to return statistics
2. Use the boot function
3. Use the boot.ci function to get the confidence intervals


##### How to interpret bootstrapping results

First we run the boot function, then we apply the boot.ci function which generates 5 different types of equi-tailed two-sided nonparametric confidence intervals: the basic bootstrap interval, teh studentized bootstrap interval, the bootstrap percentile interval, and the adjusted bootstrap percentile interval. Here we use "bca", which is a matric with 5 columns, the first column containing the level, the next two containing the indices of the order statistics used in the calculations and final two the calculated endpoints themselves.  

```
results = boot(data = observations, statistic = vd.mean, R = 10000)
ci.results = boot.ci(results, type = 'bca')
```


##### Reference

1. [Understanding bootstrap confidence interval output from the r boot package](https://www.r-bloggers.com/understanding-bootstrap-confidence-interval-output-from-the-r-boot-package/)  
2. [Nonparametric Bootstrap confidence Intervals](https://stat.ethz.ch/R-manual/R-patched/library/boot/html/boot.ci.html)
