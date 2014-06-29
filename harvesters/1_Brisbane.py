'''
UoM-twitter-for-health

BRISBANE REGION 1 
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-7########################
ckey = "5tEFHFFDWnDhjLnf6UMmBZQkQ"
csecret = "Z1DtSrcF86v8CQjmixZUyXixSjNOY3OCBqshVPczA2nFPs1OLU"
atoken = "2593822183-Xdj8bzb8gntN0hRorsUFQPmTbMednt947WU4sgR"
asecret = "HjLctRCgQr3qrALcqicIer15Lf0PV0mXvwCTcLUs5XifH"
#####################################

class listener(StreamListener):
    
    def on_data(self, data):
        dictTweet = json.loads(data)
        try:
            dictTweet["_id"] = str(dictTweet['id'])
            doc = db.save(dictTweet)
            print "SAVED" + str(doc) +"=>" + str(data)
        except:
            print "Already exists"
            pass
        return True
    
    def on_error(self, status):
        print status
        
auth = OAuthHandler(ckey, csecret)
auth.set_access_token(atoken, asecret)
twitterStream = Stream(auth, listener())

'''========couchdb'=========='''
server = couchdb.Server('http://localhost:5984/')
try:
    db = server.create('brisbane1')
except:
    db = server['brisbane1']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[152.863499,-27.628968,153.026944,-27.308968]) 