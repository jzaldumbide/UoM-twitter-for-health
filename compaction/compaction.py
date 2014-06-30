import schedule
import time
import requests
import subprocess


def job():
    print("Compacting couchdb")
    subprocess.call(["./compaction.sh"])


schedule.every(10).minutes.do(job)

while True:
    schedule.run_pending()
    time.sleep(1)
