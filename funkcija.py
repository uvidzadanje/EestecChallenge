from pip._vendor import requests
from bs4 import BeautifulSoup
import kwargs
import args
import regex
import socket
import json

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
    
    # pod = soup.select("#categories")
    # print(pod)

def abuseipdb(tip, value):
    if(tip=="domain"):
        ip_addr = socket.gethostbyname(value)
    elif (tip=="ipv4"):
        ip_addr = value
    else:
        return

    url = "https://www.abuseipdb.com/check/" + ip_addr
    response = requests.get(url).text
    soup = BeautifulSoup(response,"lxml")
    percentage = int(soup.select("div > p > b")[4].text[:-1]) / 10
    usage = soup.select(".table > tr > td")[1]

    return_value = {
        "rate" : percentage,
        "usage" : usage.text
    }

    return return_value

# print(abuseipdb("ipv4","172.217.10.142"))
  


