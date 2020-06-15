# Some thoughts on old timetables

Wouldn't it be great to be able to go back in time and see what journeys could be planned using a timetable from 50-60-70-100 years ago? Surely the technology to do that must be nearly there?

This is a collection of notes regarding what I've found so far.

In my day job I've been working a lot recently with the open data feed for the [GB rail timetable](https://datafeeds.networkrail.co.uk/), in both JSON & CIF format. I've also recently been catching up on my (real, paper) reading, including some past issues of [The Southern Way](http://www.crecy.co.uk/the-southern-way).

It struck me that it would be interesting to try to construct an electronic version of an old SR timetable, and then do journey planning on it to be able to compare "then & now". (Think Ryde-Freshwater, or the *Atlantic Coast Express* from Waterloo to Padstow.)

So, as you do, I started breaking the task down in my head into the various steps necessary:

1. Get old timetable (well that's easy, I've got Southern Region ones from 1949, 1953 & 1960)
2. Scan old timetable (not so easy)
3. OCR the scan into, say a CSV or Excel (probably going to be the hardest step)
4. Write a script to turn that into CIF/JSON
5. Play with it

Well, that's how my thinking started, then I realised how badly most tables would scan, and that I'd probably end up typing it all in by hand. Well, that would mean really sticking to just one line or table - no way I'd ever have enough time to do more than one (simple) table, let alone a whole book.

At this point I discovered [GTFS](http://gtfs.org/) - I'd never needed to know anything about it before, since my day job isn't about journey planning, it's about matching train passes to the timetable after the event. A GTFS timetable should in theory be easier to create from a CSV/Excel file. So maybe that's step (4) made a little easier. Still, the notes in text at 90 degrees (e.g. information about restaurant cars, train names, etc) would probably confuse things. There's also the not insignificant issue that, in older timetables, it's not immediately obvious whether the time against a station is a stop on this service or a connection from this service. It would usually have required local knowledge or asking the guard. (These days, the accepted practice is to put connections in *italic* type.)

I then tried to get my head around the scanning problem - step (2). On a sudden whim I googled old railway timetables - and ended up finding [Timetable World](https://timetableworld.com/)! Here is a huge collection of historical timetables, all scanned and indexed. Thank you very much to Matthew Shaw for the time and dedication he's into that site so far, and to all the contributors.

So, I picked a timetable, the [SR timetable for September 1950](https://timetableworld.com/book_viewer.php?id=6) and, for a starting point, everyone's favourite south coast holiday line, [Table 37: Havant to Hayling Island](https://timetableworld.com/image_viewer.php?id=6&section_id=1752).

In theory, surely it should be no more difficult than the transcription already carried out by armies of volunteers for family history research purposes?

Like many large images (e.g. maps, archive documents), the scans on Matthew Shaw's website are all tiled images cleverly stitched together. So it's not just a case of downloading an image and OCRing it. However, as a first test, I used Windows' Snipping Tool to grab a screenshot:

![SR Sep 1950 Table 37]({{ site.baseurl }}/images/sr_195009_37.png)

Next, just to see what would happen, I pointed [tesseract](https://sourceforge.net/projects/tesseract-ocr-alt/files/tesseract-ocr-setup-3.02.02.exe/download) at it.

Unfortunately, I got a rather uninspiring result:

    Table 37 HAVANT and HAYLING ISLAND
    | ts: — -— . = —-
    I m ; I Sun_days
    3 l Down ' , ,, ,, \_Ye_e_l;_l)n_yjs Cozgncncgcs hm M:,w._‘1951____
    l  ‘ ,a.m_n.m gm |.zn*u.m‘un lam p.ml3 0*p.m'p.m|y.m S X S 0 8 X! 30 :3 X 80 3.111 n.m {pan p.m v.m‘n.m‘p.m§p.m p.m
    __ _:Ea.v;nc , , _ , _ _. , de 5 7 348 20,9 7\1Dl9 I119 .. 1235 1 S42 ‘4)!3 344 4215 3.16 an 347 ‘(DJ 34 @884 .. 10351135 .. 12351 352 35 3 355 354? 35,7 35. .
    1 1 Langston”, Lb 37823810102211 .. 12391372 2313 371445 36 B 37 93737323837 .. 10351138’ .. l23S\3823S338538‘G38‘738 n
    n I 2§North Hlyling . .. 7 4] 279 1610261125 .. 12 1412918 41% 495 40627 4]7L'71418278-11 .. 104TIll42 .. ;1!14‘.‘.1 4 ‘£3 :5 426 ..
    a ‘J; ‘ yljx_x_g_Is1a _¢p_7 47 inc}; 2-210 1132 .. 124914-.2 33g_4jg 555 as as 4'. I 331 47333 47 .. 1o4s|11_-ss .. 134351 " gm} ’..
    I9 I_ _ _ > _ _Sn.c}n-day: only. 7* _sx Safgrdnyn excepted. I-‘ox-J-Vg_tu___|‘|_]ou1{ney._9§9_]ga;g:
    . 
    Q
    Table s'l—mmm HAYLING ISLAND and EAVANT n
    In
    ‘a " i 3: Sundays
    _ up week .3)’; commences 63!: Mag._1951
    if a.myg,mm,m 3,3) mm: a.m: 5 018! S O p.mrp_m,'p.mlp.m 9.m p.m A.mlA.m ‘p.m‘p.m{p.m p.m§n.m‘p.m!v.|n.
    __ nnylhu 1sland.. .dep7 73 013 409 45 105231 on . 1 662 53 2 574 16:5 sgq 57:5 52. 529 52 .. 1055:1155 .. 12551 552 55 4 555 as-is 5517 an: I
    2 Norm Hayling. .. 1 ms 455 449 49‘ 105411 59; . 1 W2 59 s 1 4 ms 10-: Is 567 5618 66» .. 1oo9;un9 .. 12591 59.2 5914 5355916 59:7 59‘
    3 Lnngston ,_ 7163 91S499b4‘111|12 4,‘ . 2 4:3 53 64255116 0,7 19 19 1 1141124: ‘,1 42 43 45 46 4'1 4‘B on
    —(3‘ﬂivgn_t:, .1-/_2o§> ;§‘s_5:} 9__|5_e1_:p_g;gA 3‘ _,. V'__..._2_g3 10 3 10 4A2_9«5i9:tLlq57 5 S 549%.’: __., }VI_7§s12 L: 11 82 as s_5_A§6#§7 B-S 
    so Sgﬁufdgyg gm, 5! Saturdays ucepced. —,

Hmmm. At this point, it would seem we are back to typing it all in by hand...

Incidentally, there are a couple of good threads on the issues relating to timetable scanning generally (here)[https://www.railforums.co.uk/threads/timetable-demo-for-timetableworld-com.204918/] and (here)[https://www.railforums.co.uk/threads/timetableworld-com.204425/].

As a next attempt, I therefore went for manual typing in the complete timetable. The first columns look like this:

|Miles|Down||Weekdays||||||||||||||||||
||||am|am|am|am|am|am|pm|pm|SO|pm|pm|pm|SX|SO|SX|SO|SX|SO|
|0|Havant|dep|635|734|820|907|1019|1119|1236|134|220|334|442|533|620|634|720|734|820|834|
|1|Langston||638|737|823|910|1022|1122|1239|137|223|337|445|536|623|637|723|737|823|837|
|2.5|North Hayling|||741|827|916|1026|1126|1243|141|227|341|449|540|627|641|727|741|827|841|
|4.5|Hayling Island|arr|645|747|833|922|1032|1132|1249|147|233|347|455|546|633|647|733|747|833|847|

Note that, for ease of typing, I've turned vulgar fractions into decimals in the *Miles* column, but left the times in 12-hour format. I've inserted leading zeroes in the minutes values where necessary, but not in the hours - again, to be as close to the original yet still easily be typable/interpretable.

## Summary of issues found so far

1. Digitising the original printed timetable is difficult
    1. OCR is rarely clever enough, since, as shawmat points out in the thread mentioned above, every digit has to be checked manually. (We can't even make it cleverer by adding rules regarding what values to accept, since a time in one row might actually be before the time in the row above (e.g. for connections)
    2. Manual typing would require a *huge* amount of effort. It's the sort of thing family history societies do for old documents. Typically two or more transcriptions are provided for each record, from different people, and the results compared.
2. Many old stations no longer exist. These will need to be "(re)created" for a CIF/GTFS file - the CIF file would need a unique TIPLOC for each station, the GTFS would need the lat/long co-ordinates for each one.
3. Old timetables have a number of differences to timetables these days. Well, they were printed for a start, and read:-)
    1. Times in 12 hour format not 24 hour. Not a huge problem, since we should be able to get it right most of the time - though sometimes the "a.m."/"p.m." heading gets replaced by "SO"/"SX", so we'd need to check the columns either side.
    2. Connection times shown in same font as the main/through trains - so there needs to be some guessing as to which it is. Often it's obvious - but not always.
    3. Lots of vertical text for e.g. train names or other notes.
