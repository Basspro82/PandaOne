<?php

$top = Comment::GetTop(CommentManager::MOST_COMMENTS);
$best = Comment::GetTop(CommentManager::BEST_RATED);
$worst = Comment::GetTop(CommentManager::WORST_RATED);

?>