<?php

function getProjectData($project_id, $title)
{
	return 	[
		'project_id' => $project_id,
		'title' => $title,
		'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce mollis, magna non euismod rutrum, nisi tortor mollis leo, non varius neque nisl vel est. Proin rhoncus non ligula eu congue. Integer pharetra interdum dapibus. Nulla et lorem et lectus hendrerit consectetur vitae vehicula lectus. Aliquam sollicitudin, est dictum posuere sollicitudin, sem mauris blandit lorem, non maximus orci nisi et erat. Ut nec congue risus. Donec neque sem, vulputate congue ipsum ullamcorper, fringilla volutpat felis. Sed hendrerit euismod ante, eu volutpat turpis ullamcorper sit amet. Fusce molestie metus eget ornare imperdiet. Proin quis erat non elit posuere dapibus a malesuada arcu. Donec pulvinar consectetur semper.

		Sed tellus nisl, mattis sit amet bibendum ac, interdum non quam. Suspendisse a dui efficitur, venenatis arcu sit amet, aliquet sapien. Donec eget efficitur eros, et suscipit metus. Sed sapien odio, commodo et sapien quis, venenatis pulvinar neque. Maecenas lectus lacus, vehicula a commodo eu, iaculis eu ante. Donec hendrerit massa velit, eleifend dictum purus imperdiet ac. Donec efficitur tortor quis risus consequat, congue eleifend lorem blandit. Curabitur ut nisl in arcu dictum mattis pretium ut ex. Fusce ullamcorper, risus vel tempor facilisis, eros lectus condimentum nisi, quis dictum magna sem sed purus. Mauris in semper dolor, at feugiat diam. Nam a quam bibendum, blandit augue feugiat, commodo nisl. Vivamus vitae ipsum quis urna commodo elementum. Phasellus pulvinar quis quam sed posuere. Nullam non fermentum est. Phasellus at faucibus felis. Donec rhoncus orci non nisi faucibus pretium.
		
		Donec a tortor ut massa ultrices tristique. Sed tempor ultricies sapien quis varius. Morbi tincidunt dignissim urna nec eleifend. Cras at augue velit. Nunc consectetur vel nisi ac pellentesque. Integer id nibh non ligula laoreet dictum at ornare sem. Etiam consectetur orci non libero porttitor vulputate. Ut auctor, risus et convallis efficitur, lorem libero mattis purus, vel lobortis nibh tellus nec sem. Cras a turpis sit amet elit facilisis egestas in sed risus. Curabitur lorem turpis, finibus ac nibh in, molestie consequat nunc. Praesent ipsum ligula, tempus porttitor felis ultricies, mattis porttitor ligula. Donec vestibulum, urna sit amet vestibulum mattis, metus turpis varius urna, in dignissim quam lacus et sem. Etiam eu magna at odio auctor efficitur. Nunc convallis turpis ut ante faucibus, sit amet tristique metus tincidunt. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Praesent nec risus hendrerit, accumsan neque vitae, maximus velit.
		
		Quisque blandit congue risus, et pulvinar tellus euismod non. Quisque turpis sem, sagittis vitae suscipit at, efficitur quis nunc. Nulla facilisi. In sollicitudin, dui vel mattis convallis, est enim laoreet mi, vel iaculis urna libero in odio. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Quisque tincidunt odio ut dui convallis condimentum. Suspendisse eget blandit felis. Praesent dignissim posuere euismod. Fusce vitae neque nunc. In nibh nibh, pretium et porta eget, sodales in lorem. Donec felis mi, euismod nec tincidunt a, efficitur nec metus. Donec id finibus turpis.
		
		Sed finibus blandit sapien non vehicula. Pellentesque at efficitur odio. Quisque rhoncus ipsum ut urna blandit, in fringilla turpis tincidunt. Vestibulum congue laoreet ante, at ultricies elit semper quis. Aenean quis ante interdum, egestas lorem sit amet, bibendum purus. Praesent in diam vel ligula porttitor tincidunt et et mauris. Etiam id volutpat magna. Nullam volutpat, odio ut hendrerit convallis, ex ex porta tortor, vitae varius libero enim at arcu. Sed et libero dignissim augue ornare scelerisque.',
		'display' => 1,
		'created_at' => time(),
		'updated_at' => time(),
	];
}

return [
	getProjectData(1, 'Project 1'),
	getProjectData(2, 'Project 2'),
	getProjectData(3, 'Project 3'),
	getProjectData(4, 'Project 4'),
	getProjectData(5, 'Project 5'),
	getProjectData(6, 'Project 6'),
	getProjectData(7, 'Project 7'),
	getProjectData(8, 'Project 8'),
];
