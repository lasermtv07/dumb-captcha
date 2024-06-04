# dumb-captcha
### le story
okay, this happened a while back, I was just browsing youtube like I do, and I saw [this](https://www.youtube.com/watch?v=PIdA6dH4aFM) youtube video, of a guy created colored CAPTCHA with javascript. While it probably isnt the best for prod, it looked like an interesting excercise. I also needed CAPTCHA for my other project and was lazy to learn the google recaptcha so i decided to do this. Its also not adapted well for the other projects so I will have to change that which means more [COOMMIITTSS](https://www.reddit.com/r/ProgrammerHumor/comments/nqsx0i/coomitter/) *(obligatory /s)*
### how it works, how to use etc
The CAPTCHA works on the principle, that a bot generates a grid of random colors. These colors are chosen from a list, but all have also some *DEVIATION* added. This is done in hopes that it will make the CAPTCHA less vulnerable to bots. the correct generated code is then stored in the `capt` key of the session. The grid is full of hyperlinks that direct to the same page with GET parameter `num`. Then, on loading of the page, we check if `capt==num` and if yes, we redirect. This could be reworked to use a form, or even better, two page solution, but that is left as an excersice to the reader. Oh, and for gods sake, please remove the rickroll redirect.

---

**QUOD ERAT DEMONSTATUM**
