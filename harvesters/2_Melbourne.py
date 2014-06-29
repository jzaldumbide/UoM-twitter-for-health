'''
UoM-twitter-for-health

MELBOURNE REGION 2
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-6########################
ckey = "hQ99rbOJXjF9WQ2zFgSNFPDL3"
csecret = "cfqepTLmEO8nm9WWhR0jAEyeXYyO0uknSeWvHbbc7QPuG6KmBK"
atoken = "2593822183-2hl7yA3t31w6WjRLfTNzQ8OvskMh4bRDcCKLMYE"
asecret = "i9ezX3esZ0RJ6gA0QBa3t7kOplKGoFiheDPlOY4r0UPbS"
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
    db = server.create('melbourne2')
except:
    db = server['melbourne2']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[144.9615,-38.4339,145.5125,-37.5113])  