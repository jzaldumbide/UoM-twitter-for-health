'''
UoM-twitter-for-health


MELBOURNE REGION 1
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-3########################
ckey = "a3EFsN0kUu04QtdUJlFdSBrHH"
csecret = "uXXkD81WVnhLk0M8tdNb8jDXAsQhIGzKSFcUQRlDShWFl9Wzg3"
atoken = "2593813213-Fi5yWsk71uKcGmDconMaY8obRVV4A5QXmP9TVQU"
asecret = "4nXx4BNOE9QK5MMW1TxXAxz3U69hBdB1Y1caXp2rJ0Nz0"
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
    db = server.create('melbourne1')
except:
    db = server['melbourne1']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[144.5715,-38.4339,144.9632,-37.5113])  