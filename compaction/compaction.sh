#!/bin/bash          
curl -H "Content-Type: application/json" -X POST http://localhost:5984/sydney/_compact
curl -H "Content-Type: application/json" -X POST http://localhost:5984/melbourne/_compact
curl -H "Content-Type: application/json" -X POST http://localhost:5984/brisbane/_compact
echo last compaction: compaction $(date +%Y-%m-%d_%H:%M) >> compactionlog.log