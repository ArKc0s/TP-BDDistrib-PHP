rs.initiate({_id: "rs-config", configsvr: true, version: 1, members: [{ _id: 0, host : "rs-conf-01:27017" }, { _id: 1, host : "rs-conf-02:27018" }]})