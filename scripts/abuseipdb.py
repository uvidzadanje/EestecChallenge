#!/usr/bin/env python
from pip._vendor import requests
from bs4 import BeautifulSoup
import sys
import socket
import json

def abuseipdb(tip, value):
    
    if(tip=="domain"):
        ip_addr = socket.gethostbyname(value)
    elif (tip=="ip"):
        ip_addr = value
    else:
        return

    url = "https://www.abuseipdb.com/check/" + ip_addr
    response = requests.get(url).text
    soup = BeautifulSoup(response,"lxml")
    try:
        percentage = int(soup.select("div > p > b")[4].text[:-1]) / 10
        if(percentage < 1):
             percentage = 1
        usage = soup.select(".table > tr > td")[1]
    except:
        return

    return_value = {
        "rate" : percentage,
        "usage" : usage.text
    }

    return json.dumps(return_value)


try:
    if(len(sys.argv)!=3):
        raise Exception("Error with passing arguments")

    tip = sys.argv[1]
    value = sys.argv[2]

    abuseipdb = abuseipdb(tip, value)
    print(abuseipdb)
except Exception as e:
    print(e)