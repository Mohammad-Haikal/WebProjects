const fs = require('fs');
const ytdl = require('ytdl-core');
ytdl('https://www.youtube.com/watch?v=qcGd2apznkk&list=RDMM&index=18').pipe(fs.createWriteStream('Songs/Salameh/Ward.mp4'))
