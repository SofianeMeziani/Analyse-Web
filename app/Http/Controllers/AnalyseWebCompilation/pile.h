#include <stdio.h>
#include <stdlib.h>

typedef struct ElementPile ElementPile;

    struct ElementPile {
        int info;

        ElementPile* suivant;
    };

    ElementPile *maPile, *saveElement;

    void empiler(int val) {

    ElementPile *newElement = malloc(sizeof(ElementPile));
    newElement->info=val;

    newElement->suivant = NULL; 
    saveElement=newElement;
    if (maPile == NULL) {
        maPile = newElement;
    } else {
        ElementPile *pointer = maPile;
        newElement->suivant = pointer;
        maPile = newElement;
    }

    }

  int depiler()
    {
    ElementPile *pile=maPile;
    int inf;

       inf=pile->info;

    maPile=maPile->suivant;

    free(pile);
    return inf;
    }