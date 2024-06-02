<?php

enum Permissions: int
{
    case END_USER = 0;
    case MODERATOR = 1;
    case ADMIN = 2;
}