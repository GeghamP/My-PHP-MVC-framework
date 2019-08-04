{% extends 'base.php' %}

{% block title %}
	All users
{% endblock %}

{% block body %}
	<ul>
		{% for user in users %}
			<li>	
				<h3>{{ user.id }}</h3>
				<p>{{ user.name }}</p>
			</li>
		{% endfor %}
	</ul>
{% endblock %}