CACHE_DIR:=cache
MOVIE_IMG:=movie.gif
ANIMATION:=animation.gif

all: emulate

emulate: input.png
	php ./emulate.php

muybridge:
	rm -rf $(CACHE_DIR) movie.gif
	curl -o $(MOVIE_IMG) http://ak-hdl.buzzfed.com/static/enhanced/web05/2012/10/16/15/anigif_enhanced-buzz-29520-1350416746-8.gif
	mkdir $(CACHE_DIR)
	convert $(MOVIE_IMG) -shave 83x0 $(CACHE_DIR)/animation.png

cube:
	rm -rf $(CACHE_DIR) movie.gif
	curl -o $(MOVIE_IMG) https://s-media-cache-ak0.pinimg.com/originals/57/8a/d6/578ad68d8a9937c7da23c2d3928588ec.gif
	mkdir $(CACHE_DIR)
	convert $(MOVIE_IMG) -shave 100x0 $(CACHE_DIR)/animation.png

gif: emulate
	convert -delay 10 -loop 0 `ls -rt cache/output*` $(ANIMATION)

clean:
	rm -rf $(CACHE_DIR) $(MOVIE_IMG) $(ANIMATION) output.png
