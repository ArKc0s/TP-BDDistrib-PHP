sh.addShard("rs-1/rs-01:27013")
sh.addShard("rs-1/rs-02:27014")
db.getSiblingDB("bddistrib").createUser({user: "admin", pwd: "admin", roles: [ { role: "userAdminAnyDatabase", db: "admin" } ]})