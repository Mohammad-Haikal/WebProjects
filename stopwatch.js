function Stopwatch() {
    let duration = 0;
    let increase;

    function increaseD(){ 
        duration += 0.01;
    }

    this.start = function () {
        return increase = setInterval(increaseD, 1);
    }

    this.stop = function () {
        clearInterval(increase);
    }
    this.reset = function () {
        duration = 0;
    }

    Object.defineProperty(this, 'duration', {
        get: function(){
            return duration;
        }
    })
}

const sw = new Stopwatch();