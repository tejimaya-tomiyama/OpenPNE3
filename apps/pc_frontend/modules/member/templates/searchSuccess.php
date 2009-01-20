<?php
$options = array(
  'title'  => __('メンバー検索'),
  'url'    => 'member/search',
  'button' => __('検索'),
);

op_include_parts('form', 'searchMember', $filters, $options);
?>

<?php use_helper('Date'); ?>

<?php if ($pager->getNbResults()): ?>
<?php
$list = array();
foreach ($pager->getResults() as $key => $member)
{
  $list[$key] = array();
  $list[$key][__('ニックネーム')] = $member->getName();
  if ($member->getProfile('self_intro'))
  {
    $list[$key][$member->getProfile('self_intro')->getCaption()] = nl2br($member->getProfile('self_intro'));
  }
  $list[$key][__('最終ログイン')] = distance_of_time_in_words($member->getLastLoginTime());
}

$options = array(
  'title'          =>  __('検索結果'),
  'pager'          => $pager,
  'link_to_page'   => 'member/search?page=%d',
  'link_to_detail' => 'member/profile?id=%d',
  'list'           => $list,
);

op_include_parts('searchResultList', 'searchCommunityResult', '', $options);
?>
<?php else: ?>
<?php op_include_parts('box', 'searchMemberResult', __('該当するメンバーはいませんでした。'), array('title' => __('検索結果'))) ?>
<?php endif; ?>
