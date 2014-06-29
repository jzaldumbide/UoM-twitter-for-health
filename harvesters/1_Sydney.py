'''
UoM-twitter-for-health

SYDNEY REGION 1
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-1########################
ckey = "buBgnaOFetTbfTw7uzd8495ur"
csecret = "Q6qWkN65zHFLHMltpSawfRlyWgFvDlcDX1YoQ5nQrFOc31AMwh"
atoken = "2593813213-tDSz02PMbJEEYjHbE0If8vdGXbu5nfMxfgikQgY"
asecret = "IxQ870p9u4Ru0rJ5W3DOuoFMujfRESkFTpF9o7qscDlNv"
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
    db = server.create('sydney1')
except:
    db = server['sydney1']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[151.056454,-34.014816,151.215779,-33.694816])