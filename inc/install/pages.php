<?php
// Stop script if accessed directly
if (!defined('ABSPATH')) exit;

// Set up the array of page slugs, titles, and contents
$pages = array(
    'Hey' => array(
        'title' => 'Hey',
        'content' => "Hey there! I'm Ruben, a 21-year-old coding expert from Zierikzee. I speak Dutch, English, and a bit of German, and I've been passionate about coding since I was a kid. With 2 years of professional experience, I'm now a skilled website and app developer.

When I'm not coding, you can find me on the soccer field playing defense for SV WIk 57. I bring more to the game than just warming the bench, I play also!

So, if you're looking for a coder who's always ready for a challenge and has a great sense of humor, I'm your guy! Let's make something amazing together."
    ),
    'Me' => array(
        'title' => 'Me',
        'content' => "Hi, I'm Ruben Dalebout, a 21-year-old from Zierikzee, Zeeland in the Netherlands. I was born in Goes and have a father, mother, and a sister. Currently, I live with my parents, but my goal is to move out within three years. Ideally, I would like to stay in Zeeland and work there, but the future is uncertain. I am single and don't have a relationship at the moment. We have a 5-year-old dog at home named Luna who is a Teckel and is incredibly affectionate when she wants to be. She's known as the \"Queen.\"

        I went to Sint Willibrordus Basisschool, a Christian school, where I was baptized, received First Communion, and Confirmation, but I don't have much of a connection with the church. I did it mainly out of respect for my late grandfather, whom I think about every day. I attended Pontes Pieter Zeeman in Zierikzee for secondary school and completed my MAVO. During those years, I discovered my love for programming, especially when I got sick in the first year of secondary school and slept 16 hours or more a day. I was often at home and needed an escape, which I found in coding.
        
        After completing my MAVO, I pursued an MBO degree in Application and Media Development at Grafisch Lyceum Rotterdam, which I completed in three years. At the end of this program, I did an internship at Web & App Easy B.V. in Renesse, which gave me my first experience in the professional programming world. After finishing my MBO and internship, I tried to study HBO Informatika at the Hogeschool van Rotterdam, but after half a year, I realized that the theoretical side was not for me. I prefer to do things, so I went back to my old internship company and started working there. I wanted to continue developing myself, so I enrolled in a program at LOI and am now officially a HBO Front-End Developer.
        
        I have been playing soccer since I was in fourth grade, I think. I started playing for V.V. Mevo in Zierikzee. When the club merged with another club in 2011 to become MZC'11, I realized that the massive environment didn't suit me. I played for fun and wasn't the best, but I still expected a little attention for my team. That wasn't the case. Fortunately, my family suggested checking out SV Wik 57, where my cousin was playing. I liked it so much that I joined the club and am glad I made that decision. Although it's not well-known, the club has character and is a great fit for me.
        
        Now, I am leading a very fulfilling life with great friends, an enjoyable job, and always enough to do. Sometimes, I wonder where the time goes. If anyone wants to get in touch with me, they can always reach me through my Instagram, LinkedIn, or Github account"
    ),
    'Contact' => array(
        'title' => 'Contact',
        'content' => "Hello there! My name is Ruben Dalebout and I'm glad you stumbled upon my contact page. If you're looking for someone who's a master of both coding and puns, you've come to the right place. I'm always open to new opportunities, collaborations, and coffee chats. So whether you prefer to reach out through Instagram, LinkedIn, Github, or even good old-fashioned phone calls and emails, I'm here and ready to connect. Let's make some magic happen!"
    ),
    'Projects' => array(
        'title' => 'Projects',
        'content' => "Here, I showcase my creative side and let you take a sneak peek into the amazing projects I've been a part of. From coding to design, I've got it all covered. And the best part? Some of these projects are even linked to my GitHub account, so you can get your hands dirty and try them out for yourself. Trust me, you're in for a real treat! So, buckle up and get ready for a ride through my portfolio of projects."
    )
);

// Loop through the pages array
foreach ( $pages as $slug => $page ) {
    // Check if the page already exists by its slug
    $existing_page = get_page_by_path( $slug );

    // If the page doesn't exist, create it
    if ( ! $existing_page ) {
        $new_page = array(
            'post_title' => $page['title'],
            'post_name' => $slug,
            'post_content' => $page['content'],
            'post_status' => 'publish',
            'post_type' => 'page'
        );

        $page_id = wp_insert_post( $new_page );
    }
}

// Set the Hey page as the front page
$home_page = get_page_by_path( 'Hey' );
update_option( 'page_on_front', $home_page->ID );
update_option( 'show_on_front', 'page' );

// Add post states to pages
add_filter('display_post_states', 'add_post_state', 10, 2);

function add_post_state($post_states, $post) {
    // List of all pages who should get a state added
    if(in_array($post->post_name, array('projects'))) $post_states[] = 'Archive page';
    return $post_states;
}