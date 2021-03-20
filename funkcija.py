from pip._vendor import requests
from bs4 import BeautifulSoup
import kwargs
import args
import regex

#param;
#konacni_podaci;

#opswat.com
def opswat():
    link_ip='https://exchange.xforce.ibmcloud.com/ip/'
    link_hash='https://exchange.xforce.ibmcloud.com/search/'
    link_dom='https://exchange.xforce.ibmcloud.com/url/'
   # link_file='https://exchange.xforce.ibmcloud.com/malware/'

   # parametar=getOption(param).rsplit('',1)[0]
    parametar='89.248.165.24'
    #tip=getOption(param).split[-1]
    tip='ipv6'

    link=''

    if(tip=='ipv4' or tip=='ipv6'):
        link=link_ip+parametar
    if(tip=='domain'):
         link=link_dom+parametar
    if(tip=='hash'):
        link=link_hash+parametar
    #else if(tip=='file'):
    #     link=link_file+parametar    
    if(tip=='invalid'):
        return

    ceo_tekst=requests.get(link).text
    soup=BeautifulSoup(ceo_tekst,'lxml')

    pod=soup.find_all('th')
    print(pod)

opswat()
  


