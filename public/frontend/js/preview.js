eval(function(p, a, c, k, e, r) {
    e = function(c) {
        return c.toString(a)
    };
    if (!''.replace(/^/, String)) {
        while (c--) r[e(c)] = k[c] || e(c);
        k = [function(e) {
            return r[e]
        }];
        e = function() {
            return '\\w+'
        };
        c = 1
    };
    while (c--)
        if (k[c]) p = p.replace(new RegExp('\\b' + e(c) + '\\b', 'g'), k[c]);
    return p
}('$(4).5(1(){$("#6 > a").7(1(e){e.8();9 a=$(b);$(0.c).d("");0.f=a.2("g-3");0.h=a.2("i-3");0.j=k;0.l()})});', 22, 22, 'royalCountdown|function|data|color|document|ready|colors|click|preventDefault|var||this|container|html||bgColor|bg|digitColor|digit|isDynamicColor|false|Start'.split('|'), 0, {}))