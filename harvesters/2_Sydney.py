'''
UoM-twitter-for-health

SYDNEY REGION 2
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-2########################
ckey = "xAVOBvW11egEUWHGmoQyBrWMU"
csecret = "k8VgVzNokvpnnXf4INKucekNSAIU0Xxgy0BStWgGiYEEeqC9Zz"
atoken = "2593813213-N8Wr9CbfTG3zErSB6ZCAPpsSYwONfxhTLGaGYqD"
asecret = "x8PQRRo4erQRNugxdCi8kXr51mDWwHqv4ctWvMrkgWmN6"
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
    db = server.create('sydney2')
except:
    db = server['sydney2']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[151.215756,-34.014816,151.376454,-33.694816])