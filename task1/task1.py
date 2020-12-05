#!/usr/bin/env python
# coding: utf-8

# In[107]:


from PIL import Image


# In[108]:


im = Image.open('best.bmp', 'r')


# In[109]:


pixels = list(im.getdata())


# In[110]:


sum_r = 0
for pixel in pixels:
    sum_r += pixel[0]


# In[ ]:




