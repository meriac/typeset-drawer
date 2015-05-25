CACHE_DIR:=cache
MOVIE_IMG:=movie.gif

all: emulate

emulate: input.png
	php ./emulate.php

animation: $(MOVIE_IMG)
	rm -rf $(CACHE_DIR)
	mkdir $(CACHE_DIR)
	convert $(MOVIE_IMG) -shave 100x0 $(CACHE_DIR)/animation.png

$(MOVIE_IMG):
	curl -o $@ https://s-media-cache-ak0.pinimg.com/originals/57/8a/d6/578ad68d8a9937c7da23c2d3928588ec.gif

clean:
	rm -rf $(CACHE_DIR)
