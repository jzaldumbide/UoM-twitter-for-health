'''
UoM-twitter-for-health

BRISBANE REGION 2 
==============
'''
import couchdb
from tweepy import Stream
from tweepy import OAuthHandler
from tweepy.streaming import StreamListener
import json


###API T-for-health-8########################
ckey = "mmL1j5IoV56rhjiA1wD84Sz17"
csecret = "4IHa1qbSE1m7pXFC9XTyTLMKKjtWdcKACFEPwp9IrUWsIGXap0"
atoken = "2593822183-T6zHv9sfYqYlZ5F0m2vurYph9ozpGBc6tWwVjrF"
asecret = "718vs0fOFXhW1Bo5KtSMRedCVBlVxfEnMuDy9YebBucbp"
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
    db = server.create('brisbane2')
except:
    db = server['brisbane2']
    
'''===============LOCATIONS=============='''    

twitterStream.filter(locations=[153.026921,-27.628968,153.183499,-27.308968])  