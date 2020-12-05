#!/usr/bin/env python
# coding: utf-8

# In[89]:


f = open("originale.txt", "r")


# In[90]:


list_orig = []
words = []
for line in f:
    words.append(line.strip())
    array_word = list(line.strip())
    list_orig.append(sorted(array_word))
f.close()


# In[91]:


f2 = open("really_shuffled.txt", "r")


# In[92]:


list_shuff = []
for line in f2:
    array_word = list(line.strip())
    list_shuff.append(sorted(array_word))
f2.close()


# In[93]:


presence = []
for item in list_shuff:
    if item in list_orig:
        presence.append(list_orig.index(item))


# In[94]:


key = []
for index in presence:
    key.append(words[index])


# In[95]:


final_key = ""
final_key.join(key)


# In[ ]:




